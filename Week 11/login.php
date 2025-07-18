<?php

session_start();
include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="row justify-content-center" id="login-template">
    <div class="col-md-5">
        <div class="page-title">
            <h2><i class="fas fa-sign-in-alt me-2"></i>Login</h2>
        </div>
        <div class="card">
            <div class="card-body p-4">
                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
				<?php if (!empty($_SESSION['errors']['general'])): ?>
                    <div class="alert alert-danger">
						<?= $_SESSION['errors']['general']; unset($_SESSION['errors']['general']); ?>
                    </div>
				<?php endif; ?>
                <form action="handle/users/login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= !empty($_SESSION['errors']['username']) ? 'is-invalid' : '' ?>"
                               id="username" name="username" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; unset($_SESSION['username']); ?>">
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
                    <button type="submit" name="login" class="btn btn-primary w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
