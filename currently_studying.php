<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/submit_hours.inc.php';

sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Phi Sig</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php if (login_check($mysqli) == true) : ?>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			<?php if (login_check($mysqli) == true) : ?>
                <a class="navbar-brand" href="landing-page.php">Phi Sig Study Hours</a>
            <?php else : ?>
                <a class="navbar-brand" href="index.php">Phi Sig Study Hours</a>
            <?php endif; ?>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<a href="#">Services</a>
						</li>
						<li>
							<a href="contact.php">Contact</a>
						</li>
						<li>
							<a href="includes/logout.php">Log out</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</nav>
		<!-- /.container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success"><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent.</strong></div>	 
					<?php } elseif (isset($_GET['error'])) { ?> 
						<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs.</strong></div>
					<?php } ?>
				</div>
				<form role="hoursForm" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="submit_hours">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="InputName">Time spent studying: </label>
							<label id="time"></label>
						</div>
						<input type="button" name="startTimer" id="startTimer" value="Start Timer" class="btn btn-info pull-left" onclick="startStudying();">
						<input type="submit" name="end" id="end" value="End Studying" class="btn btn-info pull-left" >
					</div>
				</form>
			</div>
		</div>
    <?php else : ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="landing-page.php">Phi Sig Study Hours</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="">Services</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="index.php">Log in</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <div class="center">
                <h1>Oops, an Error Occurred</h1>
            <p>You are not authorized to access this page.</p>
            </div>
            <p><a class="btn btn-primary btn-lg btn-block" href="index.php">Login</a>
            </p>
        </header>
    </div>
    <?php endif; ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- Timer for time script -->
	<script> 
		function updateTimer() {
			if (typeof updateTimer.counter == 'undefined') {
				//Start the timer...
				updateTimer.counter = 0;
				document.getElementById('time').innerHTML = 0;
			} else {
				//Increment the timer.
				updateTimer.counter++;
				var hoursWorked = updateTimer.counter / 3600;
				hoursWorked = hoursWorked.toFixed(4);
				document.getElementById('time').innerHTML = hoursWorked;
			}

			setTimeout(updateTimer, 1000);
		}
	</script>
	
	<script>
		function beginDialogBox() {
			window.onbeforeunload = function() {
				return "If you navigate away from this page before clicking 'Submit Hours', your hours will not be recorded. Do you still want to leave?"
			}
		}
	</script>
	
	<script>
		function turnOffDialog() {
			indow.onbeforeunload = null;
		}
	</script>
	
	<script>
		function startStudying() {
			beginDialogBox();
			if ( document.getElementById('time').innerHTML == '' ) {
				updateTimer();
			}
		}
	</script>

</body>

</html>
