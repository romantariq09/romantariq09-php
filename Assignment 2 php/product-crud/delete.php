<?php
require 'includes/config.php'; include 'includes/auth.php';
$pdo->prepare("DELETE FROM products WHERE id = ?")->execute([$_GET['id']]);
header("Location: index.php");
