<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db:3306;dbname=Polyclinics',
//    'dsn' => 'mysql:host=127.0.0.1:3306;dbname=Polyclinics',
    'username' => 'Polyclinics',
    'password' => '!secret',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
