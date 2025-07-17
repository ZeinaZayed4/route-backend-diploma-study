<?php

include 'database.php';
include "partials/header.php";

?>
	
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-5">
			<div class="card shadow">
				<div class="card-header bg-secondary-bg">
					<h4 class="mb-0 text-center">Register</h4>
				</div>
				<div class="card-body">
					<?php include "error-success.php"; ?>
					<form action="insert-handle.php" method="post">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
								   value="<?php if(isset($_SESSION['name'])) {echo $_SESSION['name']; unset($_SESSION['name']); } ?>">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
								   value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email']; unset($_SESSION['email']); } ?>">
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Create a password">
						</div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-light">Register</button>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

include "partials/footer.php";
