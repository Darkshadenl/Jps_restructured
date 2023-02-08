#!/bin/bash
source .env || exit

# Define the connection details
#PORT=22
FQDN=sftp://$HOST
STANDARD="duck --username $USER --password $PASSWORD"

COPY_EXCLUDE_LIST=(vendor node_modules .env)

res1='n'
res2='n'
res3='n'
res4='n'
res5='n'
envupload='n'
filtered=()

exec < /dev/tty

do_echo() {
  for i in $(seq 1 $1); do
    echo
  done
}

function cleanup {
    cd .. || exit
    do_echo 2
    echo Remove private_release because its a temp folder
    rm -r private_release
    echo -e "\033[32mDone\033[0m"
    exit
}

function retrieve_staged_files {
    # Get the list of file names in the Git change list of the current commit
    files=$(git diff --staged --name-only)

    do_echo 2
    echo -e "\033[38;5;208mFiles with changes:\033[0m"
    for file in $files; do
        if [[ "$file" == private/* ]]; then
            echo "$file"
            filtered+=("$file")
    fi
    done
    echo
}

function check_if_master {
    if [ "$(git rev-parse --abbrev-ref HEAD)" != "master" ]; then
        echo -e "\033[38;5;208mYou are not on the master branch. Exiting\033[0m"
        exit
    fi
}

function npm_composer_install {
    if [ "$res1" != "y" ]; then
        return
    fi
    do_echo 1
    read -t 3 -p "Install npm packages (Y/n)? " -n 1 -r answer
    do_echo 2
    if [[ $answer = "" || $answer = "Y" || $answer = "y" ]]; then
        echo Install NPM packages
        npm install
        echo -e "\033[32mDone\033[0m"
        echo
    fi
    
    do_echo 1
    read -t 3 -p "Install vendor packages (Y/n)? " -n 1 -r answer
    do_echo 2
    if [[ $answer = "" || $answer = "Y" || $answer = "y" ]]; then
        echo Install composer packages
        composer install --optimize-autoloader --no-dev
        echo -e "\033[32mDone\033[0m"
        echo
    fi
}

function upload_composer_packages {
    do_echo 1
    read -t 3 -p "Upload composer packages (Y/n)? " -n 1 -r answer
    do_echo 2
    if [[ $answer = "" || $answer = "Y" || $answer = "y" ]]; then
        $STANDARD -e overwrite --upload $FQDN/private vendor/
        rm -r vendor
    fi
}

function upload_npm_packages {
    do_echo 1
    read -t 3 -p "Upload npm packages (Y/n)? " -n 1 -r answer
    do_echo 2
    if [[ $answer = "" || $answer = "Y" || $answer = "y" ]]; then
        $STANDARD -e overwrite --upload $FQDN/private node_modules/
        rm -r node_modules
    fi
}

function change_to_private_release {
    do_echo 3
    echo changed directory to private_release
    do_echo 1

    mkdir private_release

    for f in private/*; do
        filename="${f##*/}"
        should_copy=1

        for exclude in "${COPY_EXCLUDE_LIST[@]}"; do
            if [[ $filename == $exclude ]]; then
                should_copy=0
                break
            fi
        done

        if [[ $should_copy -eq 1 ]]; then
            cp -r "$f" private_release/
        fi
    done
    cd private_release || exit
}

function questionaire {
    do_echo 2

    read -p "Only upload staged files? (y/N) " ulti
    read -p "Did you install any new packages (npm, composer) (y/N) " res1

    if [ "$ulti" != "y" ]; then
        read -p "Optimize cache + optimize view loading? (y/N) " res2
        echo -e "\033[38;5;208mpublic folder will be optimized for sftp\033[0m"
        read -p "Upload completely new public folder? (y/N) " res5
        read -p "Upload .env (check script)? (y/N) " envupload
        read -p "Upload all images? (y/N) " res3
        read -p "Full site renewal (upload full site except for filtered out in prev questions)? (y/N) " res4
    else
        run_short_upload
        exit
    fi

}

function run_short_upload {
    if [ "$ulti" != "y" ]; then
        return
    fi

    echo -e "\033[38;5;208mRunning short upload (staged files only)\033[0m"
    echo -e "\033[38;5;208mShort upload only uploads staged files and possible npm/composer files.\033[0m"

    npm_composer_install
    if [ "$res1" = "y" ]; then
        upload_npm_packages
        upload_composer_packages
    fi

    list_length=${#filtered[@]}

    if [[ $list_length -gt 0 ]]; then
        for file in "${filtered[@]}"; do
            if [[ "$file" == private/* ]] && 
                [[ "$file" != private/public/* ]] && 
                    [[ "$file" != private/storage/* ]]; then
                    $STANDARD -e overwrite --upload $FQDN/private/ "$file"
            fi
        done
        echo -e "\033[38;5;208mDone uploading committed files. Exiting\033[0m"
    else
        echo -e "\033[38;5;208mNo files to upload\033[0m"
    fi

    cleanup
}

function optimize_view_and_cache {
    if [ "$res2" != "y" ]; then
        return
    fi
    echo Optimize cache and optimize view loading
    php artisan config:cache
    echo

    php artisan view:cache
    echo
}

function optimize_public_folder {
    if [ "$res5" != "y" ]; then
        return
    fi
    # shellcheck source=optimize_public.sh
    source ../optimize_public.sh
    optimize_public
    echo $dirname
}

function upload_env {
    if [ "$envupload" != "y" ]; then
        return
    fi
    echo Upload .env file

    # shellcheck source=create_env.sh
    source create_env.sh

    php artisan config:clear

    $STANDARD -e overwrite --upload $FQDN/private .env
    echo -e "\033[32mDone\033[0m"
}

function upload_all_img_files {
    if [ "$res3" != "y" ]; then
        return
    fi
    $STANDARD -e overwrite --upload $FQDN/www/storage storage/img 
    rm -r storage/img
}

function upload_public_folder {
    if [ "$res5" != "y" ]; then
        return
    fi
    $STANDARD -e overwrite --upload $FQDN/www/storage public/
    rm -r public
}

function upload_everything_else {
    if [ "$res4" != "y" ]; then
        return
    fi
    echo Copy everything inside private_release to remote private
    $STANDARD -e overwrite --upload $FQDN/private private_release/ 
    echo -e "\033[32mDone\033[0m"
    echo
}



function setup {
    check_if_master
    retrieve_staged_files
}

trap cleanup INT

setup

change_to_private_release
# location is currently private_release
# location is clean (no node_modules, vendor, .env)
questionaire
run_short_upload
optimize_view_and_cache
optimize_public_folder
upload_public_folder
upload_env
upload_all_img_files
upload_everything_else
read -p "Wait for enter to continue"
cleanup
