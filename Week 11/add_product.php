<?php

session_start();

include 'partials/header.php';
include 'partials/nav.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

?>

<div class="row justify-content-center" id="add-product-template">
	<div class="col-md-5">
		<div class="page-title">
			<h2><i class="fas fa-plus me-2"></i>Add New Product</h2>
		</div>
		<div class="card">
			<div class="card-body p-4">
				<?php if (!empty($_SESSION['errors']['general'])): ?>
                    <div class="alert alert-danger">
						<?= $_SESSION['errors']['general']; unset($_SESSION['errors']['general']); ?>
                    </div>
				<?php endif; ?>
				<form action="handle/products/add.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="product_name" class="form-label">Product Name</label>
							<input type="text" class="form-control <?= !empty($_SESSION['errors']['name']) ? 'is-invalid' : '' ?>" id="product_name"
                                   name="name" value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : ''; unset($_SESSION['name']); ?>">
                            <div class="invalid-feedback">
								<?= isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '';  unset($_SESSION['errors']['name']) ?>
                            </div>
						</div>
						<div class="col-md-12 mb-3">
							<label for="price" class="form-label">Price ($)</label>
							<input type="number" class="form-control <?= !empty($_SESSION['errors']['price']) ? 'is-invalid' : '' ?>" id="price"
                                   name="price" step="0.01" value="<?= isset($_SESSION['price']) ? $_SESSION['price'] : ''; unset($_SESSION['price']); ?>">
                            <div class="invalid-feedback">
								<?= isset($_SESSION['errors']['price']) ? $_SESSION['errors']['price'] : '';  unset($_SESSION['errors']['price']) ?>
                            </div>
						</div>
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control <?= !empty($_SESSION['errors']['image']) ? 'is-invalid' : '' ?>" id="image" name="image">
                            <div class="invalid-feedback">
								<?= isset($_SESSION['errors']['image']) ? $_SESSION['errors']['image'] : '';  unset($_SESSION['errors']['image']) ?>
                            </div>
                        </div>
					</div>
					<div class="text-center">
						<button type="submit" name="add" class="btn btn-success me-2">
							<i class="fas fa-plus me-2"></i>Add Product
						</button>
						<a href="index.php" class="btn btn-secondary">
							<i class="fas fa-times me-2"></i>Cancel
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php'; ?>
