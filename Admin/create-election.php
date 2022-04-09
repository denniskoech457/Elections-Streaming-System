<?php 
  session_start(); 
  if (!isset($_SESSION['admin_id'])) {
	
	header('location: login.php');
	
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['admin_id']);
	
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ELECTION 2022</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script src="../assets/js/sweetalert.min.js"></script>
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
</head>
<body>

<?php
        
        include 'nav.php';
    ?>



	<div class="wrapper">
		<div class="container">
			<div class="row">
				


				<div class="span9">
					<div class="content">
                    <p><a href="index.php">home</a> / CREATE ELECTION</p>
						<div class="module">
						
							<div class="module-head">
								<h3>CREATE ELECTION</h3>
							</div>
							<div class="module-body">

									<br />

									<form class="form-horizontal row-fluid" action="" method="POST"  enctype="multipart/form-data">
									<?php include 'postserver.php'; ?>
										<div class="control-group">
											<label class="control-label" for="basicinput">ELECTION TITLE TYPE</label>
											<div class="controls">
												<input type="text" name="type"  id="basicinput" placeholder="Type election title here..." class="span8" required>
									
											</div>
										</div>
                                        
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="election-type" class="btn">Add ELECTION TYPE</button>
											</div>
										</div>
									</form>
							</div>
						</div>
                      
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2021 Oloshipa Wild Photography </b> All rights reserved.
		</div>
	</div>
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
    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>