<?php

session_start();

include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="row justify-content-center" id="register-template">
	<div class="col-md-5">
		<div class="page-title">
			<h2><i class="fas fa-user-plus me-2"></i>Register</h2>
		</div>
		<div class="card">
			<div class="card-body p-4">
				<form action="handle/users/register.php" method="post">
					<?php if (!empty($_SESSION['errors']['general'])): ?>
                        <div class="alert alert-danger">
							<?= $_SESSION['errors']['general']; unset($_SESSION['errors']['general']); ?>
                        </div>
					<?php endif; ?>
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control <?= !empty($_SESSION['errors']['username']) ? 'is-invalid' : '' ?>"
                               id="username" name="username" value="<?= !empty($_SESSION['username']) ? $_SESSION['username'] : ''; unset($_SESSION['username']); ?>">
                        <div class="invalid-feedback">
							<?= isset($_SESSION['errors']['username']) ? $_SESSION['errors']['username'] : '';  unset($_SESSION['errors']['username']) ?>
                        </div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control <?= !empty($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>" id="password" name="password">
                        <div class="invalid-feedback">
							<?= isset($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : '';  unset($_SESSION['errors']['password']) ?>
                        </div>
					</div>
					<button type="submit" name="register" class="btn btn-primary w-100">
						<i class="fas fa-user-plus me-2"></i>Register
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'partials/footer.php'; ?>
