#!/bin/bash

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

# Run composer install
echo -e "\033[32mRunning composer install...\033[0m"
composer install

# Optimize the Laravel website
echo -e "\033[32mOptimizing the Laravel website...\033[0m"
php artisan optimize
php artisan config:cache
php artisan route:cache

echo -e "\033[32mDone!\033[0m"
