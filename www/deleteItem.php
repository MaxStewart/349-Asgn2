<?php

$id = $_GET['id'];

echo $id;
$db_host = '192.168.33.14';
$db_name = 'fvision';
$db_user = 'webuser';
$db_pass = 'Alexander';

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