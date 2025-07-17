<?php

session_start();
require_once 'database.php';

$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);

if (isset($_SESSION['lang'])) {
    if ($_SESSION['lang'] == 'ar') {
		require_once 'ar.php';
    } else {
		require_once 'en.php';
    }
} else {
    require_once 'en.php';
}

?>

<!DOCTYPE html>
<html lang="<?= $lang['lang'] ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <title><?= $lang['blog'] ?></title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--
	TemplateMo 546 Sixteen Clothing
	https://templatemo.com/tm-546-sixteen-clothing
	-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="padding-0">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><h2><em><?= $lang['blog'] ?></em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if ($page === "index.php" || $page === '') echo 'active' ?>">
                        <a class="nav-link" href="index.php"><?= $lang['all posts'] ?></a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item <?php if ($page === "addPost.php" || $page === '') echo 'active' ?>">
                            <a class="nav-link" href="addPost.php"><?= $lang['add post'] ?></a>
                        </li>
                        <li class="nav-item <?php if ($page === "logout.php" || $page === '') echo 'active' ?>">
                            <a class="nav-link" href="handle/logout.php"><?= $lang['logout'] ?></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item <?php if ($page === "login.php" || $page === '') echo 'active' ?>">
                            <a class="nav-link" href="login.php"><?= $lang['login'] ?></a>
                        </li>
                        <li class="nav-item <?php if ($page === "register.php" || $page === '') echo 'active' ?>">
                            <a class="nav-link" href="register.php"><?= $lang['register'] ?></a>
                        </li>
                    <?php endif; ?>
					<?php if($lang['lang'] == 'ar'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="handle/change_lang.php?lang=en">English</a>
                        </li>
					<?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="handle/change_lang.php?lang=ar">العربية</a>
                        </li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
