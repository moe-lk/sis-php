#!/bin/bash
#from https://github.com/protacon/labs-slack-integration/blob/master/docker-entrypoint.sh
set -e

# If we're starting web-server we need to do following:
#   1) Set correct rights on /application/var -folder
#   2) Clear cache
#   3) Warmup cache

HTTPDUSER='cat /etc/passwd | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\: -f1'

php /application/bin/console cache:clear --no-warmup
php /application/bin/console cache:clear --env prod --no-warmup
php /application/bin/console cache:warmup
php /application/bin/console cache:warmup --env prod

exec "$@"