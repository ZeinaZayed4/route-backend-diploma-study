<?php

require_once 'inc/header.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT posts.*, users.name FROM `posts`
              JOIN `users`
              ON posts.user_id = users.id
              WHERE posts.id = $id";
	$result = mysqli_query($conn, $query);
    
	if (mysqli_num_rows($result) == 1) {
		$post = mysqli_fetch_assoc($result);
	} else {
		header("Location: 404.php");
	}
	
} else {
	header("Location: 404.php");
}

?>

<!-- Page Content -->
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>new Post</h4>
                    <h2>add new personal post</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="best-features about-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our Background</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-image">
                    <img src="uploads/<?= $post['image'] ?>" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <h4><?= $post['title'] ?></h4>
                    <p><?= $post['body'] ?></p>
                    <p><b>Created at: </b><?= $post['created_at'] ?></p>
                    <p><b>Created by: </b><?= $post['name'] ?></p>

                    <div class="d-flex justify-content-center">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="editPost.php?id=<?= $post['id'] ?>" class="btn btn-success mr-3 "> edit post</a>
                            <form action="handle/delete.php?id=<?= $post['id'] ?>" method="post">
                                <button type="submit" name="submit" class="btn btn-danger "> delete post</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/footer.php' ?>
