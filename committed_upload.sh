#!/bin/bash

# Check for staged git documents
echo "Checking for staged git documents..."
staged_files=$(git diff --cached --name-only)

# Filter the files to only include those in the private folder
private_files=""
for file in $staged_files; do
    if [[ $file == private/* ]]; then
        private_files="$private_files $file"
    fi
done

# Upload the filtered files to the sftp remote server
HOST=jpsretail.nl
USER=jpsretail.nl
PASSWORD=RBHebgXuVq93

echo -e "\033[0;31mUploading files to the remote server...\033[0m"
echo 
echo "Change dir to private"
cd private || exit

for file in $private_files; do
    if [[ $file == private/public* ]]; then
        remote_location="sftp://$HOST/www/"
    else
        remote_location="sftp://$HOST/private/"
    fi
    echo -e "\033[0;33mUploading\033[0m" "\033[0;31m::\033[0m" $remote_location "${file#private/}"
    duck --username $USER --password $PASSWORD -e overwrite --upload $remote_location "${file#private/}"
done

echo "Upload complete."




