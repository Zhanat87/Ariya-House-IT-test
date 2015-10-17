<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database'    => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'ariya-house-it',
        'charset'  => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        // добавить свои директории для загрузки
        'servicesDir'    => APP_PATH . '/app/services/',
        'helpersDir'    => APP_PATH . '/app/helpers/',
        'baseUri'        => 'http://ariya-house-it.test/',
    ),
    "auth" => [
        "username" => "user",
        "password" => "test",
    ],
));
