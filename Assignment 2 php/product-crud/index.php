<?php
require 'includes/config.php';
include 'includes/header.php';
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Products</h2>
  <?php if(isset($_SESSION['user_id'])): ?>
    <a href="create.php" class="btn btn-success">Add Product</a>
  <?php endif; ?>
</div>
<div class="row">
  <?php foreach($products as $p): ?>
  <div class="col-md-4 mb-3">
    <div class="card">
      <?php if($p['image']): ?><img src="uploads/<?= htmlspecialchars($p['image']) ?>" class="card-img-top"><?php endif; ?>
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($p['name']) ?></h5>
        <p class="card-text"><?= htmlspecialchars($p['description']) ?></p>
        <?php if(isset($_SESSION['user_id'])): ?>
          <a href="update.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
          <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>
