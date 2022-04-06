<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', '');
define('DATABASE', 'login');
try {
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
}

include_once ('Class/clientes.php');
$llamado = new Clientes($conn);
