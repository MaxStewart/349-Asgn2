<?php

$id = $_GET['id'];

echo $id;
$db_host = 'cosc349db.c2omwcd3vted.us-east-1.rds.amazonaws.com';
$db_name = 'COSC349DB';
$db_user = 'admin';
$db_pass = 'password';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_pass);

// sql to delete a record
$sql = "DELETE FROM purchases WHERE id = $id";

if ($pdo->exec($sql)) {
    header('Location: databaseContents.php');
    exit;
} else {
    echo "Error deleting record";
}