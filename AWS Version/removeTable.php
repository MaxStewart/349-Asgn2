<?php

$db_host = 'cosc349db.c2omwcd3vted.us-east-1.rds.amazonaws.com';
$db_name = 'COSC349DB';
$db_user = 'admin';
$db_pass = 'password';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_pass);

$sql = "DROP TABLE purchases";
$pdo->exec($sql);

$sql = "DROP TABLE categories";
$pdo->exec($sql);