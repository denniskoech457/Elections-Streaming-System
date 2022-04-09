<?php 
  session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN-ELECTION 2022</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<script src="../assets/js/sweetalert.min.js"></script>
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		ELECTION 2022
			  	</a>

			
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" action="" method="POST">
					<?php include('regserver.php') ?>
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" name="username" type="text" placeholder="username" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" id="inputPassword" placeholder="Password" required>
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" name="login" class="btn btn-primary pull-right">Login</button>
									<label class="checkbox">
										<input type="checkbox"> Remember me
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2022 Election 2022 </b> All rights reserved.
		</div>
	</div>
	<?php include('errors2.php') ?>
	<?php if (isset($_SESSION['status']) && $_SESSION['status'] !='' )
        {
          ?>
          <script>
          
          swal({
          title: "<?php echo $_SESSION['status']  ; ?>",
          text: "<?php echo $_SESSION['more']  ; ?>",
          icon: "<?php echo $_SESSION['status_code']  ; ?>",
          button: "ok",
          });
        </script>
        <?php 
         unset($_SESSION['status']);
       }
      ?>
	     <?php if (isset($_GET['status']) && $_GET['status'] !='' )
        {
          ?>
          <script>
          
          swal({
          title: "<?php echo $_GET['status']  ; ?>",
          text: "<?php echo $_GET['more']  ; ?>",
          icon: "<?php echo $_GET['status_code']  ; ?>",
          button: "ok",
          });
        </script>
        <?php 
         unset($_GET['status']);
       }
      ?>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>