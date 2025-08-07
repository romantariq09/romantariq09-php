<?php
session_start();
require 'includes/config.php';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php"); exit;
    }
    $error = "Invalid credentials";
}
include 'includes/header.php';
?>
<h2>Login</h2>
<?php if(isset($error)): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
<form method="POST">
  <input name="username" class="form-control mb-2" placeholder="Username" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button class="btn btn-primary">Login</button>
</form>
<?php include 'includes/footer.php'; ?>
