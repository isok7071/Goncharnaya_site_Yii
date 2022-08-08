<?php
    $url = parse_url(getenv("DATABASE_URL"));
return [
    
    'class' => 'yii\db\Connection',
    'dsn' => 'psql:host='.$url['host'].';dbname='.$url["database"].'',
    'username' => $url["username"],
    'password' => $url["password"],
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
