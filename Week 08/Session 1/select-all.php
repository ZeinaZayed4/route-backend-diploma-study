<?php

require_once 'database.php';
include 'partials/header.php';

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC); ?>

    <div class="container mt-5">
        <div class="row">
			<?php foreach ($users as $user): ?>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h4 class="card-title"><?= "Customer number: {$user['id']}" ?></h4>
                            <p class="card-text"><?= "Name: {$user['name']}" ?></p>
                            <p class="card-text"><?= "Email: {$user['email']}" ?></p>
                            <div class="d-flex gap-2">
                                <a href="insert-form.php" class="btn btn-primary">Add</a>
                                <a href="update-form.php?id=<?= $user['id']; ?>" class="btn btn-warning">Update</a>
                                <form action="delete-handle.php?id=<?= $user['id']; ?>" method="post" class="d-inline">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
<?php } else {
	header("Location: 404.php");
}

include 'partials/footer.php';

?>


