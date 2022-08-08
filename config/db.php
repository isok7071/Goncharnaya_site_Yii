<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'psql:host='.$_ENV['Host'].';dbname='.$_ENV['dbname'].'',
    'username' => $_ENV['username'],
    'password' => $_ENV['password'],
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
