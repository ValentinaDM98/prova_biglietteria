<?php

$config = [
    'db_engine' => 'mysql',
    'db_host' => 'localhost',
    'db_name' => 'biglietteria_on_line',
    'db_user' => 'root',
    'db_password' => '',
];

$db_config = $config['db_engine'] . ":host=".$config['db_host'] . ";dbname=" . $config['db_name'];
try {
    $pdo = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        
    ]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // echo ("connesso al db");
} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
