<?php
    if (!empty($data)) {
        $title = ucfirst(array_key_first($data));
        $message = $data[array_key_first($data)];
        $type = array_key_first($data);
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authen</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<!--    <link rel="stylesheet" href="--><?php //echo url('public/css/auth/style.css')?><!--">-->
    <link rel="stylesheet" href="<?php echo url('public/css/normalize.css')?>">
    <link rel="stylesheet" href="<?php echo url('public/css/public/authed-contact/index.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo url('public/css/public/toast/toast.css')?>">
</head>
<body>
<?php require_once  assets('app/Views/public/toasts/index.php')?>
<div class="login-page">
    <div class="wrapper">
        <div class="container login-content white-space">
            <div class="row">
                <div class="login-left col-12 col-md-4">
                    <div class="login-header">
                        <div class="login-header-content">
                            <h1>Welcome to our website</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab, in.</p>
                        </div>
                    </div>
                    <div class="form">
                        <form action="<?php echo url('auth/process_login')?>" class="login-form" method="POST">
                            <div class="form-group">
                                <label for="email_address">Email</label>
                                <input type="email" class="form-control" name="email_address" id="email_address"
                                       aria-describedby="emailHelpId" placeholder="name@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn text-white p-0 btn-login w-100">
                                    <span>Sign In</span>
                                    <img src="<?php echo url('public/assets/images/arrow-right.svg')?>" alt="arrow right">
                                </button>
                            </div>
                            <div class="form-group">
                                <p class="message">Don’t have an account yet? <a href="#">Sign Up</a></p>
                            </div>
                        </form>
                        <form action="<?php echo url('auth/process_register')?>" class="register-form" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       aria-describedby="emailHelpId" placeholder="name@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email</label>
                                <input type="email" class="form-control" name="email_address" id="email_address"
                                       aria-describedby="emailHelpId" placeholder="name@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                       placeholder="Enter your password">
                            </div>
                            <div class="form-group genders">
                                <span>
                                    <label for="male">Male</label>
                                    <input type="radio" value="male" id="male" name="gender" />
                                </span>
                                <span>
                                    <label for="female">Female</label>
                                    <input type="radio" value="female" id="female" name="gender" />
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn text-white p-0 btn-register w-100">
                                    <span>Sign Up</span>
                                    <img src="<?php echo url('public/assets/images/arrow-right.svg')?>" alt="arrow right">
                                </button>
                            </div>
                            <div class="form-group">
                                <p class="message">Already registered? <a href="#">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                    <a href="<?php echo url()?>" class="col-12 pl-0">
                        <button class="learn-more btn-previous">
                            <span class="button-text">Previous page</span>
                            <span class="circle" aria-hidden="true">
                              <span class="icon arrow"></span>
                            </span>
                        </button>
                    </a>
                </div>

                <div class="login-right col-12 col-lg-8 d-none d-md-block">
                    <img src="<?php echo url('public/assets/images/login-img.svg')?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo url('public/assets/images/color-sharp.png')?>" alt="" class="background-image-left">
    <img src="<?php echo url('public/assets/images/color-sharp2.png')?>" alt="" class="background-image-right">
</div>
</body>
<script>

    $('.message a').click(function () {
        console.log($('form').animate({ height: "toggle", opacity: "toggle" }, "ease-in-out"));
    });
    <?php if (!empty($data)) {?>
        toast({
            title: "<?php echo $title?>",
            message: "<?php echo $message?>",
            type: "<?php echo $type?>",
            duration: 3000
        })
    <?php }?>
</script>
</html>
