#!/bin/bash
create_env() {
    touch .env

    echo "
    APP_NAME='Jps Retail Service'
    APP_ENV=production
    APP_KEY=base64:vm7CSlS0chgKpqSkyZ+gZL2iw76Nt7TfVFBskvAGVds=
    APP_DEBUG=false
    APP_URL=https://jpsretail.nl

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=jpsretail_nl_jpsretail
    DB_USERNAME=jpsretail_nl_jpsretail
    DB_PASSWORD=pgBYfYgWMJ8m

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DRIVER=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=127.0.0.1

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=mail.jpsretail.nl
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=info@jpsretail.nl
    MAIL_FROM_NAME='JPS Retail | Jan Peter Stuurstraat'

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1

    MIX_PUSHER_APP_KEY='${PUSHER_APP_KEY}''
    MIX_PUSHER_APP_CLUSTER='${PUSHER_APP_CLUSTER}'
    " > .env
}