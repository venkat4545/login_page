<html>
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/userlogin.css">  
    <div class="form">
        <div class="title">Admin Login</div><img src="<?php base_url()?>assets/images/logo.PNG" class="img"/>
        <form action="<?php base_url()?>" method="POST">
            <div class="input-container ic1">
            <input type="text" name="email" class="input" placeholder=" "/><div class="cut cut-short"></div><label class="placeholder">Email </label> 
            </div>
            <div class="input-container ic1">
            <input type="password" name="password" class="input" placeholder=" "/><div class="cut cut-short"></div><label class="placeholder">Password </label> 
            </div><br>
            <a href="/">Forgot Password?</a>
            <button type="submit" class="submit">Login</button>       
        </form>
    </div>
</html>