#!/bin/bash

# Define the connection details
HOST=jpsretail.nl
PORT=22
USER=jpsretail.nl
PASSWORD=RBHebgXuVq93
FQDN=sftp://$HOST
STANDARD="duck --username $USER --password $PASSWORD"

# Copy private to private_release
cp -r private private_release

cd private_release

echo "Install composer packages"
composer install --optimize-autoloader --no-dev

echo Install NPM packages
npm install

echo Optimize cache
php artisan config:cache

echo Optimize view loading
php artisan view:cache

echo Copy public + storage/img  to storage/
#$STANDARD -e overwrite --upload $FQDN/www/storage public/
#$STANDARD -e overwrite --upload $FQDN/www/storage storage/img 

echo Remove storage/img and public
rm -r public
rm -r storage/img

echo Move up a folder
cd ..

echo Copy everything inside private_release to remote private
$STANDARD -e overwrite --upload $FQDN/private private_release/ 

rm -r private_release


