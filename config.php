<?php
/**
 * @database - configuration for PDO()
 */
 //localhost
return [
    'database' => [
        'name' => 'boardgamesapp',
        'username' => 'root',
        'password' => 'Heelgeheim123!',
        'connection' => 'mysql:host=localhost:3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
