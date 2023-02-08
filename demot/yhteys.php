<?php
$dsn = 'mysql:dbname=gabmup20_samarium;host=gabmup20.treok.io';
$user = 'gabmup20_samarium';
$password = 'mB73uxrcb;D;';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?> 