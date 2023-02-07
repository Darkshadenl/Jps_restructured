#!/bin/bash

# Define the connection details
HOST=jpsretail.nl
#PORT=22
USER=jpsretail.nl
PASSWORD=RBHebgXuVq93
FQDN=sftp://$HOST
STANDARD="duck --username $USER --password $PASSWORD"

# Get the current commit hash
commit=$(git rev-parse HEAD)

# Get the list of file names in the Git change list of the current commit
files=$(git diff-tree --no-commit-id --name-only -r $commit)


cd private || exit

# Loop through the file names and print their locations
for file in $files; do
    echo "$(pwd)/$file"
    echo $file
    result="${string#*/Jps_restructured}"

    exit

    # Strip the ./ prefix
    file="${file#./*}"
    formatted=file
    # Check if the file has an extension
    if [[ "$file" == *.* ]]; then
        echo "$file"
    else
        formatted="$file"/
    fi

    $STANDARD -e overwrite --upload $FQDN/www/storage public/
done
exit

echo -e "\033[38;5;208mone uploading committed files. Exiting\033[0m"



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
    cd private || exit

    if [ "$res1" = "y" ]; then
        echo "Running npm install and composer install."
        npm_composer_install
    else
        echo "Skipping npm install and composer install."
    fi

    
    # Loop through the file names and print their locations
    for file in $files; do
        echo "$(pwd)/$file"
        result="${string#*/Jps_restructured}"

        exit

        # Strip the ./ prefix
        file="${file#./*}"
        formatted=file
        # Check if the file has an extension
        if [[ "$file" == *.* ]]; then
            echo "$file"
        else
            formatted="$file"/
        fi

        $STANDARD -e overwrite --upload $FQDN/www/storage public/
    done

    echo -e "\033[38;5;208mone uploading committed files. Exiting\033[0m"
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