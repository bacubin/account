<?php
return [
    'account' => [
        'wrapperClass' => 'Doctrine\DBAL\Connections\MasterSlaveConnection',
        'driver' => 'pdo_mysql',
        'master' => [
            'user'     => 'root',
            'password' => 'root', 
            'host'     => 'localhost', 
            'dbname'   => 'higo_account'
        ],
        'slaves' => [
            [
                'user'     => 'root',
                'password' => 'root', 
                'host'     => 'localhost:3306', 
                'dbname'   => 'higo_account'
            ],
            [
                'user'     => 'root',
                'password' => 'root', 
                'host'     => 'localhost:3306', 
                'dbname'   => 'higo_account'
            ],
        ]
    ]
];
