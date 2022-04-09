
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
	<script src="../assets/js/sweetalert.min.js"></script>
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
					<p><a href="index.php">home</a> / UPDATE RESULTS</p>
						<div class="module">
						
							<div class="module-head">
								
								<h3>UPDATE RESULTS </h3>
								
							</div>
							<div class="module-body">

							<?php
                                // Include the database configuration file
                                include 'dbcon.php';
								$candidate_id = $_GET['candidate_id']; // get id through query string
                                // Get records from the database
                                $askdetails = $db->query("SELECT * FROM candidates where candidate_id='$candidate_id' ");

                                if($askdetails->num_rows > 0){ 
                                    while($details = $askdetails->fetch_assoc()){ 
                                        
                                ?>

									
										<div class="control-group">
											<label class="control-label" for="basicinput">Candidate Name</label>
											<div class="controls">
												<h4> <?php echo $details['name']; ?></h4>
									
											</div>
										</div>
          
										<div class="control-group">
											<label class="control-label" for="basicinput">POSITON</label>
											<div class="controls">
												<h4 ><?php echo $details['position']; ?> </h4>
									
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">PARTY</label>
											<div class="controls">
												<h4> <?php echo $details['party']; ?> </h4>
									
											</div>
										</div>
									<form class="form-horizontal row-fluid" action="" method="POST">
										<?php
			
											include 'postserver.php';
										?>
										<div class="control-group">
											<label class="control-label" for="basicinput">VOTES</label>
											<div class="controls">
												<input type="number" name="votes" value="<?php echo $details['votes']; ?>" id="basicinput" class="span8">
									            <input type="hidden" name="candidate_id" value="<?php echo $details['candidate_id']; ?>" id="">
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="updateresults" class="btn">Update Election Results</button>
											</div>
										</div>
									</form>
							</div>
						</div>
						<?php }} ?> 
						
						
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
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>