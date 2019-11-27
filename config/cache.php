<?php

use Cake\Cache\Cache;

// Using a short name
Cache::config('default', [
    'className' => 'Redis',
    'duration' => '+1 hours',
    'path' => sys_get_tmp_dir(),
    'prefix' => '_cake_core_'
]);

Cache::config('_cake_core_', [
    'className' => 'Redis',
    'prefix' => '_cake_core_',
    'path' => CACHE . 'persistent/',
    'serialize' => true,
    'port' => 6379,
    'host'=> 'localhost',
    'duration' => '+1 hours',
    'prefix' => '_cake_core_'
]);

Cache::config('_cake_core_', [
    'className' => 'Redis',
    'prefix' => '_cake_core_',
    'path' => CACHE . 'persistent/',
    'serialize' => true,
    'port' => 6379,
    'host'=> 'localhost',
    'duration' => '+1 hours',
    'prefix' => '_cake_core_'
]);

// Using a fully namespaced name.
Cache::config('long', [
    'className' => 'Cake\Cache\Engine\RedisEngine',
    'duration' => '+1 week',
    'prefix' => '_cake_core_'
]);

// Using a constructed object.
$object = new FileEngine($config);
Cache::config('other', $object);
