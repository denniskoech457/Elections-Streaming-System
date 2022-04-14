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
                    <p><a href="index.php">home</a> / post results</p>
						<div class="module">
						
							<div class="module-head">
								<h3>ADD CANDIDATE AND ELECTION RESULTS</h3>
							</div>
							<div class="module-body">

									<br />

									<form class="form-horizontal row-fluid" action="" method="POST"  enctype="multipart/form-data">
									<?php include 'postserver.php'; ?>
										<div class="control-group">
											<label class="control-label" for="basicinput">Candidate Name</label>
											<div class="controls">
												<input type="text" name="name"  id="basicinput" placeholder="Type Candidate Name here..." class="span8" required>
									
											</div>
										</div>
                                        <div class="control-group">
                                            <label  class="control-label" for="image ">candidate image</label>
                                            <div class="controls">
                                             <input type="file" class="span8" name="profilepic" required>
											 <input type="hidden" value="<?php echo $type= $_GET['type_id']; ?>" name="type" >
                                             <input type="hidden" value="<?php echo $ward_id= $_GET['ward_id']; ?>" name="ward_id" >
                                             <input type="hidden" value="<?php echo $consti_id= $_GET['consti_id']; ?>" name="consti_id" >
											 
                                            </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Aspirant position</label>
											<div class="controls">

                                            <?php
                                                    include 'dbcon.php';

                                                    $result = $db->query("select  position from positions where election_id='$type' ");

                                                    
                                                    echo "<select name='position' tabindex='1' data-placeholder='Select here..' class='span8' required>";

                                                    while ($row = $result->fetch_assoc()) {

                                                                unset( $name);
                                                                
                                                                $name = $row['position']; 
                                                                echo '<option value="'.$name.'">'.$name.'</option>';

                                                }

                                                    echo "</select>";
                                                    
                                                ?> 

											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Candidate Party</label>
											<div class="controls">

                                            <?php

                                                                    include 'dbcon.php';

                                                    $result = $db->query("select  partyname from party");

                                                    
                                                    echo "<select name='party' tabindex='1' data-placeholder='Select here..' class='span8' required>";

                                                    while ($row = $result->fetch_assoc()) {

                                                                unset( $name);
                                                                
                                                                $name = $row['partyname']; 
                                                                echo '<option value="'.$name.'">'.$name.'</option>';

                                                }

                                                    echo "</select>";
                                                    
                                                ?> 

											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="add-ward-candidate" class="btn">Add Candidate</button>
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