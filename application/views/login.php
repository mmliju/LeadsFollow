<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Login Page</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
</head>

  <body class="login-img3-body">
	
    <div class="container">
		
      <form class="login-form" method="post" action="<?php echo base_url(); ?>index.php/login/authenticate">        
        <div class="login-wrap">
        	<div class="error"><?php if(isset($message)) echo $message; ?></div>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>

    </div>


  </body>
</html>
