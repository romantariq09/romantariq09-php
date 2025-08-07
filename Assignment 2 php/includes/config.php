<?php
$host = 'localhost';
$dbname = 'your_db';
$user = 'your_user';
$pass = 'your_pass';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Conn Error: " . $e->getMessage());
}
