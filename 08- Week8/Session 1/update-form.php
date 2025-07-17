<?php

include 'database.php';
include "partials/header.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$query = "SELECT * FROM `users` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
	} else {
		header("Location: 404.php");
	}
} else {
	header("Location: 404.php");
}

?>

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-5">
			<div class="card shadow">
				<div class="card-header bg-secondary-bg">
					<h4 class="mb-0 text-center">Update</h4>
				</div>
				<div class="card-body">
					<?php include "error-success.php"; ?>
					<form action="update-handle.php?id=<?= $id ?>" method="post">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?? ''; ?>">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?? ''; ?>">
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
						</div>
						<div class="d-grid">
							<button type="submit" name="update" class="btn btn-light">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

include "partials/footer.php";
