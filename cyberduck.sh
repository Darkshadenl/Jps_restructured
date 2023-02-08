#!/bin/bash
source .env || exit

# Define the connection details
#PORT=22
FQDN=sftp://$HOST
STANDARD="duck --username $USER --password $PASSWORD"

res1='n'
res2='n'
res3='n'
res4='n'
filtered=()

function retrieve_staged_files {
    # Get the list of file names in the Git change list of the current commit
    files=$(git diff --staged --name-only)

    # echo 'files with changes' in color red
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
    # in orange echo 'Cleanup old npm and composer files'
    echo -e "\033[38;5;208mCleanup old npm and composer files\033[0m"
    rm -r node_modules
    rm -r vendor

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
    cp -r private private_release
    cd private_release || exit
    echo changed directory to private_release
}

function cleanup_env {
    echo removing .env
    rm .env
    echo
}

function questionaire {
    echo 
    echo

    read -p "Only upload staged files? (y/n) " ulti
    read -p "Did you install any new packages (npm, composer) (y/n) " res1

    if [ "$ulti" = "n" ]; then
        read -p "Optimize cache + optimize view loading? (y/n) " res2
        echo -e "\033[38;5;208mpublic folder will be optimized for sftp\033[0m"
        read -p "Upload all images + completely new public folder? (y/n) " res3
        read -p "Full site renewal (upload full site except for filtered out in prev questions)? (y/n) " res4
    else
        run_short_upload
        exit
    fi

}

function run_short_upload {
    echo -e "\033[38;5;208mShort upload only uploads staged files and possible npm/composer files.\033[0m"

    if [ "$res1" = "y" ]; then
        echo "Running npm install and composer install."
        npm_composer_install
    else
        echo "Skipping npm install and composer install."
    fi

    for file in "${filtered[@]}"; do
        if [[ "$file" == private/* ]] && 
            [[ "$file" != private/public/* ]] && 
                [[ "$file" != private/storage/* ]]; then
                $STANDARD -e overwrite --upload $FQDN/private/ "$file"
        fi
    done

    echo -e "\033[38;5;208mDone uploading committed files. Exiting\033[0m"
}

function optimize_view_and_cache {
    echo Optimize cache and optimize view loading
    php artisan config:cache
    echo

    php artisan view:cache
    echo
}

function optimize_public_folder {
    echo
}

function upload_all_img_files {
    $STANDARD -e overwrite --upload $FQDN/www/storage storage/img 
    rm -r storage/img
}

function upload_public_folder {
    $STANDARD -e overwrite --upload $FQDN/www/storage public/
    rm -r public
}

function upload_everything_else {
    echo Copy everything inside private_release to remote private
    $STANDARD -e overwrite --upload $FQDN/private private_release/ 
    echo -e "\033[32mDone\033[0m"
    echo

    echo Remove private_release because its a temp folder
    rm -r private_release
    echo -e "\033[32mDone\033[0m"
}

function setup {
    # Read user input, assign stdin to keyboard
    check_if_master
    exec < /dev/tty
    retrieve_staged_files
    change_to_private_release
    cleanup_env
}


setup
questionaire


