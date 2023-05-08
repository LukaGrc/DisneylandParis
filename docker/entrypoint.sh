#!/usr/bin/env bash

# composer install -n
php bin/console d:s:d --force
php bin/console d:s:u --force
php bin/console d:f:l --no-interaction

exec "$@"