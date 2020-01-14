<?php
/**
 * Created by: stephanhoeksema 2018
 * phpoop
 */
/**
 * @database - configuration for PDO()
 */
//return [
//    'database' => [
//        'name' => 'S1131670',
//        'username' => 'S1131670',
//        'password' => 'YALMj7UsWqoP@s',
//        'connection' => 'mysql:host=adsd.clow.nl:3306',
//        'options' => [
//            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
//        ]
//    ]
//];

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
