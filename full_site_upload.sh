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

source build_site.sh || exit

build

# Upload the files to the server
cd ..
echo -e "\033[32mStarting upload to server...\033[0m"
echo
$STANDARD -e overwrite --upload $FQDN/private p-r/ 


trap cleanup INT