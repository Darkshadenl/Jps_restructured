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
filtered=()

exec < /dev/tty

do_echo() {
  for i in $(seq 1 $1); do
    echo
  done
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
    if [ "$res1" = "n" ]; then
        return
    fi

    echo Install NPM packages
    npm install
    echo -e "\033[32mDone\033[0m"
    echo

    echo Install composer packages
    composer install --optimize-autoloader --no-dev
    echo -e "\033[32mDone\033[0m"
    echo
}

function change_to_private_release {
    do_echo 3
    echo changed directory to private_release
    do_echo 3

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
            echo "Copying $f"
            cp -r "$f" private_release/
        fi
    done
    cd private_release || exit
}

function questionaire {
    do_echo 2

    read -p "Only upload staged files? (y/n) " ulti
    read -p "Did you install any new packages (npm, composer) (y/n) " res1

    if [ "$ulti" = "n" ]; then
        read -p "Optimize cache + optimize view loading? (y/n) " res2
        echo -e "\033[38;5;208mpublic folder will be optimized for sftp\033[0m"
        read -p "Upload completely new public folder? (y/n) " res5
        read -p "Upload all images? (y/n) " res3
        read -p "Full site renewal (upload full site except for filtered out in prev questions)? (y/n) " res4
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

    for file in "${filtered[@]}"; do
        if [[ "$file" == private/* ]] && 
            [[ "$file" != private/public/* ]] && 
                [[ "$file" != private/storage/* ]]; then
                $STANDARD -e overwrite --upload $FQDN/private/ "$file"
        fi
    done

    echo -e "\033[38;5;208mDone uploading committed files. Exiting\033[0m"
    exit
}

function optimize_view_and_cache {
    if [ "$res2" = "n" ]; then
        return
    fi
    echo Optimize cache and optimize view loading
    php artisan config:cache
    echo

    php artisan view:cache
    echo
}

function optimize_public_folder {
    if [ "$res5" = "n" ]; then
        return
    fi
    echo not implemented yet
}

function upload_all_img_files {
    if [ "$res3" = "n" ]; then
        return
    fi
    $STANDARD -e overwrite --upload $FQDN/www/storage storage/img 
    rm -r storage/img
}

function upload_public_folder {
    if [ "$res5" = "n" ]; then
        return
    fi
    $STANDARD -e overwrite --upload $FQDN/www/storage public/
    rm -r public
}

function upload_everything_else {
    if [ "$res4" = "n" ]; then
        return
    fi
    echo Copy everything inside private_release to remote private
    $STANDARD -e overwrite --upload $FQDN/private private_release/ 
    echo -e "\033[32mDone\033[0m"
    echo
}

function cleanup {
    cd .. || exit
    do_echo 2
    echo Remove private_release because its a temp folder
    rm -r private_release
    echo -e "\033[32mDone\033[0m"
    exit
}

function setup {
    check_if_master
    retrieve_staged_files
    change_to_private_release
}

trap cleanup INT

setup
# location is currently private_release
questionaire
run_short_upload
optimize_view_and_cache
optimize_public_folder
upload_public_folder
upload_all_img_files
upload_everything_else
cleanup
