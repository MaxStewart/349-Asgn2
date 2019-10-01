<?php

$db_host = 'cosc349db.c2omwcd3vted.us-east-1.rds.amazonaws.com';
$db_name = 'COSC349DB';
$db_user = 'admin';
$db_pass = 'password';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_pass);

$sql = "CREATE TABLE purchases (
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    amount VARCHAR(10) NOT NULL,
    category VARCHAR(50) NOT NULL,
    notes VARCHAR(100)
)";
$pdo->exec($sql);

$sql = "CREATE TABLE categories (
    name VARCHAR(50) PRIMARY KEY
)";
$pdo->exec($sql);