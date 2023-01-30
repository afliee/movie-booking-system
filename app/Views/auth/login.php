<a href="<?php echo url()?>">HOME</a>

<?php
    if (isset($error)) {
        echo $error;
    }
?>
<form action="<?php echo url('auth/process_login')?>" method="post" >
    email:
    <input type="text" name="email_address" /> <br>
    password:
    <input type="text" name="password" /> <br>
    remember
    <input type="checkbox" name="remember"> <br>
    <button>OK</button>
</form>