<?php

// DataBase
return [
    'class' => '\Micro\Db\DbConnection',
    'arguments' => [
        'container' => '@this',
        'config' => [
            'connectionString' => 'mysql:host=localhost;dbname=micro',
            'username' => 'micro',
            'password' => 'micro',
        ],
        'options' => [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''],
    ]
];
