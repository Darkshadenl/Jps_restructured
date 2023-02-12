#!/bin/bash

exec < /dev/tty

# Ask the user if he wants to upload the full website or just git staged files
echo "Do you want to upload the full website or just committed files?"
select choice in "Full" "Committed"; do
    case $choice in
        Full ) bash full_site_upload.sh; break;;
        Committed ) bash committed_upload.sh; break;;
    esac
done
