<?php

require_once 'inc/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// offset = (page - 1) * limit
$limit = 3;
$offset = ($page - 1) * $limit;

$query = "SELECT COUNT(`id`) AS total FROM `posts`";
$result = mysqli_query($conn, $query);
$total = mysqli_fetch_assoc($result)['total'];

$no_pages = ceil($total / $limit);

if ($page > $no_pages) {
    header("Location: {$_SERVER['PHP_SELF']}?page=$no_pages");
} elseif ($page < 1) {
	header("Location: {$_SERVER['PHP_SELF']}?page=1");
}

$query = "SELECT * FROM `posts` LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    header("Location: 404.php");
}

?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <!-- <h4>Best Offer</h4> -->
                <!-- <h2>New Arrivals On Sale</h2> -->
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <!-- <h4>Flash Deals</h4> -->
                <!-- <h2>Get your best products</h2> -->
            </div>
        </div>
        <div class="banner-item-03">
            <div class="text-content">
                <!-- <h4>Last Minute</h4> -->
                <!-- <h2>Grab last minute deals</h2> -->
            </div>
        </div>
    </div>
</div>
<!-- The Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Posts</h2>
                    <?php include 'inc/error_success.php'; ?>
                    <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
                </div>
            </div>
			<?php foreach ($posts as $post): ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="viewPost.php?id=<?= $post['id'] ?>"><img src="uploads/<?= $post['image'] ?>" alt=""></a>
                        <div class="down-content">
                            <a href="<?= "viewPost.php?id={$post['id']}" ?>">
                                <h4><?= $post['title']; ?></h4>
                            </a>
                            <h6><?= $post['created_at'] ?></h6>
                            <p> <?= $post['body'] ?></p>
                            <div class="d-flex justify-content-end">
                                <a href="viewPost.php?id=<?= $post['id'] ?>" class="btn btn-info "> view</a>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>"><a class="page-link" href="<?= $_SERVER['PHP_SELF'] . ('?page=' . ($page - 1)); ?>">Previous</a></li>
                <?php for ($i = 1; $i <= $no_pages; ++$i): ?>
                    <li class="page-item"><a class="page-link" href="<?= $_SERVER['PHP_SELF'] . ('?page=' . $i); ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                <li class="page-item <?= ($page == $no_pages) ? 'disabled' : '' ?>"><a class="page-link" href="<?= $_SERVER['PHP_SELF'] . ('?page=' . ($page + 1)); ?>">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

<?php require_once 'inc/footer.php' ?>
