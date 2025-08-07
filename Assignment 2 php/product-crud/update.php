<?php
require 'includes/config.php'; include 'includes/auth.php'; include 'includes/header.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $img = $p['image'];
    if ($_FILES['image']['name']) {
        $img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$img");
    }
    $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, image=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['description'], $img, $id]);
    header("Location: index.php"); exit;
}
?>
<h2>Edit Product</h2>
<form method="POST" enctype="multipart/form-data">
  <input name="name" class="form-control mb-2" value="<?= htmlspecialchars($p['name']) ?>" required>
  <textarea name="description" class="form-control mb-2"><?= htmlspecialchars($p['description']) ?></textarea>
  <input type="file" name="image" class="form-control mb-2">
  <button class="btn btn-primary">Update</button>
</form>
<?php include 'includes/footer.php'; ?>
