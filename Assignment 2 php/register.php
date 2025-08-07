<?php
require 'includes/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$u, $p]);
    header("Location: login.php");
}
include 'includes/header.php';
?>
<h2>Register</h2>
<form method="POST">
  <input name="username" class="form-control mb-2" placeholder="Username" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button class="btn btn-primary">Register</button>
</form>
<?php include 'includes/footer.php'; ?>
