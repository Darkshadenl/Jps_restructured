#!/bin/bash
source .env || exit

FQDN=sftp://$HOST
STANDARD="duck --username $USER --password $PASSWORD"

cleanup(){
    rm -r p-r
}


# Only do a full site upload on master branche.
if [ "$(git rev-parse --abbrev-ref HEAD)" != "master" ]; then
        echo -e "\033[38;5;208mYou are not on the master branch.\033[0m"
        echo -e "\033[38;5;208mNot uploading\033[0m"
        echo -e "\033[32mExiting\033[0m"
        exit 0
fi

# Make an empty folder named p-r next to Private
echo -e "\033[32mMaking an empty folder named p-r next to Private...\033[0m"
mkdir ../p-r

# Copy everything inside the folder private except vendor and node_modules folder and index.php file
echo -e "\033[32mCopying everything inside the folder private...\033[0m"
cd private
cp -R . ../p-r/
cd ../p-r
rm -rf vendor node_modules
cd public
rm index.php
cd ..
rm .env

# Run composer install
echo -e "\033[32mRunning composer install...\033[0m"
composer install

# Optimize the Laravel website
echo -e "\033[32mOptimizing the Laravel website...\033[0m"
php artisan optimize
php artisan config:cache
php artisan route:cache

echo -e "\033[32mDone!\033[0m"

# Upload the files to the server
cd ..
echo -e "\033[32mStarting upload to server...\033[0m"
echo
$STANDARD -e overwrite --upload $FQDN/private p-r/ 


trap cleanup INT