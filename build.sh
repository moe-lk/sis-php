#!/bin/sh
bin/cake cache clear_all
bin/cake migrations migrate
bin/cake orm_cache clear
bin/cake orm_cache build