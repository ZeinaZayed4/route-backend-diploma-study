<?php

session_start();

require_once 'database.php';
include 'partials/header.php';
include 'partials/nav.php';

$query = "SELECT * FROM `products`";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $_SESSION['errors']['empty'] = 'No Data Found!';
}

?>

<div class="container mt-5">
	<?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success mb-5">
			<?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
	<?php endif;?>
	<?php if (isset($_SESSION['errors']['empty'])): ?>
        <div class="alert alert-danger">
			<?= $_SESSION['errors']['empty']; unset($_SESSION['errors']['empty']) ?>
        </div>
	<?php endif;?>

    <div class="row g-4">
		<?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-2 mb-5">
                <div class="card h-100 shadow">
                    <div class="product-image">
                        <img src="uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="card-img-top"
                             style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="card-body d-flex flex-column mt-5">
                        <h4 class="card-title"><?= ucfirst($product['name']) ?></h4>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <h5 class="mb-0" style="color: #667eea">Price: $<?= $product['price'] ?></h5>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                                <form method="post" action="handle/products/order.php" class="d-inline">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit" name="order" class="btn btn-success btn-sm">
                                        <i class="fas fa-shopping-cart me-1"></i>Order Now
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
