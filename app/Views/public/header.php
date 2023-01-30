<?php
if (session()->exists('success')) {
    $title = 'Success';
    $message = session()->get('success');
    $type = 'success';
    session()->forget('success');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
            integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!--    link css component -->
    <link rel="stylesheet" href="<?php echo url('public/css/public/header.css') ?>">
    <link rel="stylesheet" href="<?php echo url('public/css/public/banner.css') ?>">
    <link rel="stylesheet" href="<?php echo url('public/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php echo url('public/css/public/toast/toast.css') ?>">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="<?php echo url('public/css/ticket/style.css') ?>">
    <link rel="stylesheet" href="<?php echo url('public/css/public/footer.css')?>">
    <link rel="stylesheet" href="<?php echo url('public/css/public/home.css')?>">
    <script src="<?php echo url('public/js/common/banner.js'); ?>"></script>
</head>
<body>
<?php require_once assets('app/Views/public/toasts/index.php') ?>
<?php require_once assets('app/Views/public/loading/index.php') ?>
<section class="header" id="header">
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="<?php echo url() ?>">
                    <!--                    <img-->
                    <!--                            src="-->
                    <?php //echo url('public/assets/images/logo.svg') ?><!--" alt="">-->
                    <!--                    <img src="https://img.icons8.com/external-dreamcreateicons-detailed-outline-dreamcreateicons/64/000000/external-movie-museum-dreamcreateicons-detailed-outline-dreamcreateicons.png"/>-->
                    <img src="<?php echo url('public/assets/images/logo-removed.png') ?>" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id='navbar'>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link navbar-link active" href="<?php echo url('movie') ?>">Movie <span
                                        class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-link " href="#">Futures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-link " href="<?php echo url('contact')?>">Contact</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                    <?php if (session()->exists('name')) { ?>
                        <div class="dropdown">
                            <h4 class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span style='text-transform: uppercase;'><?php echo session()->get('name') ?></span>
                            </h4>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <a class='login-btn' href="<?php echo url('auth/logout') ?>">
                            <button onsubmit="return false">
                                <span>Logout</span>
                            </button>
                        </a>
                    <?php } else { ?>
                        <span>Wellcome Guest!</span>
                        <a class='login-btn' href="<?php echo url('auth/') ?>">
                            <button onsubmit="return false">
                                <span>Login</span>
                            </button>
                        </a>
                    <?php } ?>
                </span>
                </div>
            </nav>
        </div>
    </header>
</section>

