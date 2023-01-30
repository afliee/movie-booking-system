<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
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
</head>
<body>
<div class="contact__page">
    <div class="wrapper">
        <div class="container-fluid contact__content white-space">
            <div class="row">
                <div class="contact__left col-12 col-lg-4 col-md-6">
                    <div class="contact__left__heading">
                        <div class="heading__content">
                            <h1 class="heading__content--head">Get In Touch</h1>
                            <p>We are here for you! How can we help?</p>
                        </div>
                    </div>
                    <div class="contact__form form">
                        <form action="<?php echo url('auth/process_login')?>" class="form__content" method="POST">
                           <div class="form-group form__content--name">
                               <label for="name">Your Name</label>
                               <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                           </div>
                           <div class="form-group form__content--email">
                               <label for="email">Your Email</label>
                               <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                           </div>
                           <div class="form-group form__content--message">
                               <label for="message">Message</label>
                               <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Go ahead, We are listening..."></textarea>
                           </div>
                           <div class="form-group contact__form--submit">
                               <button type="submit" class="btn text-white p-0 w-100 btn-submit">
                                   <span>Submit</span>
                                   <img src="<?php echo url('public/assets/images/arrow-right.svg')?>" alt="arrow right">
                               </button>
                           </div>
                        </form>
                        <div class="contact--another">
                            <span class="mr-2">Another contact methods </span>
                            <a href="#"><img src="<?php echo url('public/assets/images/email-icon.svg')?>" alt=""></a>
                            <a href="#"><img src="<?php echo url('public/assets/images/location-icon.svg')?>" alt=""></a>
                            <a href="#"><img src="<?php echo url('public/assets/images/phone-icon.svg')?>" alt=""></a>
                        </div>
                    </div>
                    <a href="<?php echo url()?>" class="col-12 pl-0">
                        <button class=" btn-previous">
                            <span class="button-text">Previous page</span>
                            <span class="circle" aria-hidden="true">
                              <span class="icon arrow"></span>
                            </span>
                        </button>
                    </a>
                </div>

                <div class="contact__right col-12 col-lg-8 col-md-6 d-none d-md-block">
                    <img src="<?php echo url('public/assets/images/contact-img.svg')?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo url('public/assets/images/color-sharp.png')?>" alt="" class="background-image-left">
    <img src="<?php echo url('public/assets/images/color-sharp2.png')?>" alt="" class="background-image-right">
</div>
</body>
</html>
