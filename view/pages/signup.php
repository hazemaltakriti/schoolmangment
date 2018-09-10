<html>
    <head>
        <link href="<?php echo ASSET . DS . 'pagecss' . DS . 'login.css' ?>" rel="stylesheet"/>
<!--         <script src="jquery-1.10.2.min.js"></script>
 -->        
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
            
            <div id="signupform">
                <form method='post' action="<?php echo WEBSITE_NAME . DS . 'signup/authuser';  ?>">
                    <h1>SIGN UP</h1>
                    <input type="text" name='username'  placeholder="User Name" value=<?php if( isset($username) ) echo $username ;?> ><br>
                    <div class='error'><?php if( isset($usernameerr) ) echo $usernameerr  ?>  </div>
                    <input type="email"  name='email' placeholder="Email" value=<?php if( isset($email) ) echo $email ;?>><br>
                    <div class='error'><?php if( isset($emailerr) ) echo $emailerr  ?>  </div>

                    <input type="password" name='password'  placeholder="Password" value=<?php if( isset($password) ) echo $password ;?>><br>
                    <div class='error'><?php if( isset($passworderr) ) echo $passworderr  ?>  </div>
                    <button type='submit' name='signup' >SIGN UP</button>
                </form>
            </div>
            
            <div id="login_msg">Have an account?</div>
            <div id="signup_msg">Don't have an account?</div>
            
           <a href="<?php echo WEBSITE_NAME . DS . 'login/user'; ?>"><button id="login_btn">LOGIN</button></a>
            <button id="signup_btn">SIGN UP</button>

        </div>
    </body>
</html>

<script>
      $(document).ready(function()
    {
        $('#signup_btn').click();
    });
</script>