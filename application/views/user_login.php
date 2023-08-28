<html>
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/userlogin.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="form">
        <div class="title">User Login</div><img src="<?php base_url()?>assets/images/logo.PNG" class="img"/>
        <form action="<?php base_url()?>user_login_validation" method="POST">
            <div class="input-container ic1">
            <input type="text" name="user_email" class="input" placeholder=" " required/><div class="cut cutt-short"></div><label class="placeholder">Email </label> 
            </div>
            <div class="input-container ic1">
            <input type="password" name="user_password" id="password" class="input" placeholder=" " required/><span class="eye" id="faeye"><i class="fa fa-eye" ></i></span><div class="cut cut-short"></div><label class="placeholder">Password </label>
            </div><br>
            <a href="/">Forgot Password?</a><br>
            <button type="submit" class="submit">SSO Login</button>       
        </form>
        <p style="color: white;">Dont have account?</p><a href="<?php base_url()?>signup">Click Here</a>
    </div>
    <script>
        const password=document.getElementById('password');
        const hide=document.getElementById('faeye');
        const eyeIcon = hide.querySelector('i');
        hide.addEventListener('click',function(){
            if(password.type==='password'){
                password.type='text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash')
            }else{
                password.type='password';
                eyeIcon.classList.add('fa-eye');
                eyeIcon.classList.remove('fa-eye-slash')    
            }
        })
    </script>
</html>