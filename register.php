<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Registration Form</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
    <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
    ?>
    <!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h1 class="text-center">Register</h1>
          </div>
          <div class="modal-body">
              <form class="form col-md-12 center-block" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
                <div class="form-group">
                  <input type="text" class="form-control input-lg" placeholder="Email" name="email" id='email'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control input-lg" placeholder="Username" name="username" id='username'>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control input-lg" placeholder="Password" name="password" id="password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control input-lg" placeholder="Confirm Password" name="confirmpwd" id="confirmpwd">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg btn-block" onclick="return regformhash(this.form,this.form.username, this.form.email,this.form.password,this.form.confirmpwd);" value="Register">Register</button>
                  <span class="pull-right">Return to the <a href="index.php">login</a> page</span><span><a href="#">Need help?</a></span>
                </div>
              </form>
          </div>
          <div class="modal-footer">
              <div class="col-md-12">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
              </div>    
          </div>
      </div>
  </div>
</div>
    </body>
</html>