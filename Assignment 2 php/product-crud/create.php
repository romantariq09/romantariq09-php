<?php
require 'includes/config.php'; include 'includes/auth.php'; include 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$img");
    $stmt = $pdo->prepare("INSERT INTO products (name, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['description'], $img]);
    header("Location: index.php"); exit;
}
?>
<h2>Add Product</h2>
<form method="POST" enctype="multipart/form-data">
  <input name="name" class="form-control mb-2" placeholder="Name" required>
  <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
  <input type="file" name="image" class="form-control mb-2" required>
  <button class="btn btn-success">Add</button>
</form>
<?php include 'includes/footer.php'; ?>
