<?php
$dsn = 'mysql:dbname=20mupgab;host=localhost';
$user = '20mupgab';
$password = 'salasana';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?> 