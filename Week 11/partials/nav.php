<?php //var_dump($_SESSION); exit();?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<i class="fas fa-shopping-cart me-2"></i>ShopHub
		</a>
		
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">
						<i class="fas fa-home me-1"></i>Home
					</a>
				</li>
				<?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
				<?php else: ?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="add_product.php">
                                <i class="fas fa-plus me-1"></i>Add Product
                            </a>
                        </li>
				    <?php endif; ?>
                
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </li>
                <?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
