#!/bin/sh
bin/cake cache clear_all
bin/cake migrations migrate
bin/cake orm_cache clear
bin/cake orm_cache build
mkdir -p logs tmp
chgrp -R www-data logs tmp webroot
chmod -R g+rw logs tmp webroot