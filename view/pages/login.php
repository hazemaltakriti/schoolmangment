<html>
    <head>
        <link href="<?php echo ASSET . DS . 'pagecss' . DS . 'login.css' ?>" rel="stylesheet"/>
       
         <script src="<?php   echo ASSET; ?>/js/jquery-2.1.4.min.js"></script>

        <script src="<?php echo ASSET ; ?>/pagejs/login.js"></script>
    </head>
    <style>
        input:focus
        {
           
            transition: font-size 0.5s;
            transition: padding 0.5s;
            font-size:1.3em;
            padding-bottom :10px;
        }
        .error
        {
            color:red;
        }
    </style>
    <body>
        <div id="box">
            <div id="main"></div>
            
            <form action="<?php echo WEBSITE_NAME . DS . 'login/authuser' ?>" method='post'>
                <div id="loginform">
                    <h1>LOGIN</h1>
                    <input type="email" name='email' placeholder="Email"   action="<?php echo WEBSITE_NAME . DS . 'login/authuser';  ?>" required  value=<?php if( isset($email) ) echo $email ;?>><br>
                    <input type="password" name='password' placeholder="Password"><br>
                    <div class='error'><?php if(isset($error)) echo $error; ?></div>
                    <button>LOGIN</button>
                </div>
            </form>
 
            <div id="login_msg">Have an account?</div>
            <div id="signup_msg">Don't have an account?</div>
            
            <button id="login_btn">LOGIN</button>
            <a href="<?php echo WEBSITE_NAME . DS . 'signup/user' ?>"><button id="signup_btn">SIGN UP</button></a>

        </div>
    </body>
</html>
<script>
     
</script>
