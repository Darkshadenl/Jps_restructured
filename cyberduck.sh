#!/bin/bash

# Define the connection details
HOST=jpsretail.nl
#PORT=22
USER=jpsretail.nl
PASSWORD=RBHebgXuVq93
FQDN=sftp://$HOST
STANDARD="duck --username $USER --password $PASSWORD"

# Get the list of file names in the Git change list of the current commit
files=$(git diff --staged --name-only)
filtered=()

for file in $files; do
    if [[ "$file" == private/* ]]; then
        echo "$file"
        filtered+=("$file")
fi
done

res1='n'
res2='n'
res3='n'
res4='n'

read -p "Only upload commit files? (y/n) " ulti
read -p "Do you need to run a full npm install and composer install? (y/n) " res1

if [ "$ulti" = "n" ]; then
    read -p "Is optimize cache + optimize view loading needed? (y/n) " res2
    read -p "Upload all images + completely new public folder? (y/n) " res3
    read -p "Full site renewal (upload full site)? (y/n) " res4

    # Copy private to private_release
    cp -r private private_release

    cd private_release || exit
    echo changed directory to private_release
else

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
    exit
fi


if [ "$res1" = "y" ]; then
    npm_composer_install
else
  echo "Skipping npm install and composer install."
fi



if [ "$res2" = "y" ]; then

    echo Optimize cache
    php artisan config:cache
    echo -e "\033[32mDone\033[0m"
    echo

    echo Optimize view loading
    php artisan view:cache
    echo -e "\033[32mDone\033[0m"
    echo
    
else
  echo "Skipping Optimize cache and optimize view loading."
fi



if [ "$res3" = "y" ]; then

    echo Copy public + storage/img  to storage/
    $STANDARD -e overwrite --upload $FQDN/www/storage public/
    $STANDARD -e overwrite --upload $FQDN/www/storage storage/img 
    echo -e "\033[32mDone\033[0m"
    echo

    echo Remove storage/img and public
    rm -r public
    rm -r storage/img
    echo -e "\033[32mDone\033[0m"
    echo
    
else
  echo "Skipping upload of images and public folder."
fi

if [ "$res4" = "y" ]; then

    echo Move up a folder
    cd ..
    echo -e "\033[32mDone\033[0m"
    echo

    echo Copy everything inside private_release to remote private
    $STANDARD -e overwrite --upload $FQDN/private private_release/ 
    echo -e "\033[32mDone\033[0m"
    echo

    echo Remove private_release because its a temp folder
    rm -r private_release
    echo -e "\033[32mDone\033[0m"
    
else
  echo "Skipping full site renewal."
fi




function npm_composer_install {
    echo Install NPM packages
    npm install
    echo -e "\033[32mDone\033[0m"
    echo

    echo Install composer packages
    composer install --optimize-autoloader --no-dev
    echo -e "\033[32mDone\033[0m"
    echo
}