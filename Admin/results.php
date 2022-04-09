
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
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php

        include "dbcon.php"; // Using database connection file here
        $type = $_GET['type_id'];
		$position = $_GET['position'];
        $titles = mysqli_query($db, "select * from candidates where type_id='$type'"); // fetch data from database

        while($data = mysqli_fetch_array($titles))
        {
        ?>
    <!-- Site Metas -->
    <title><?php echo $position; ?> RESULTS- <?php

include "dbcon.php"; // Using database connection file here
$type = $_GET['type_id'];
$titles = mysqli_query($db, "select * from elections where type_id='$type'"); // fetch data from database

while($data = mysqli_fetch_array($titles))
{
?> <?php echo $data['type']; ?><?php } ?> </title>
    <meta name="keywords" content="UDA NOMINATIONS, 2022 ELECTIONS">
    <meta name="description" content="<?php echo $data['type']; ?>">
    <meta name="author" content="">
    <?php } ?> 

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
						<?php
                                        // Include the database configuration file
                                        include 'dbcon.php';
                                        
                                        // Get records from the database
										$type = $_GET['type_id'];
										$position = $_GET['position'];
                                        $query = $db->query("SELECT * FROM elections where type_id='$type'");
                                        
                                        if($query->num_rows > 0) 
                                            while($elecresults = $query->fetch_assoc()){
                                                
                                        ?>
                     <p><a href="index.php">home</a> / <a href="election.php?type_id=<?php echo $elecresults['type_id']; ?>"><?php echo $elecresults['type']; ?> </a> / <a href="positions.php?type_id=<?php echo $elecresults['type_id']; ?>">POSITIONS</a> / ELECTION 2022</p>
				

						<div class="module">
						
							<div class="module-head">
							    
								<h3> <?php echo $elecresults['type']; ?> <?php echo $position;?> RESULTS-ELECTION 2022</h3>
								<a href="post-blog.php?type_id=<?php echo $type= $_GET['type_id']; ?>" class="btn btn-primary">+ ADD ASPIRANTS</a>
								<?php } ?>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 " width="100%">
									<thead>
										<tr>
										    <th>Candidate Profile</th>
											<th>Candidate</th>
											<th>Position</th>
											<th>Votes</th>
											<th>Party</th>
                                            <th>action</th>
											
										</tr>
									</thead>
									<tbody>
                                    <?php
                                        // Include the database configuration file
                                        include 'dbcon.php';
                                        
                                        // Get records from the database
										$type = $_GET['type_id'];
										$position = $_GET['position'];
                                        $query = $db->query("SELECT * FROM candidates where position='$position' AND type_id='$type' ORDER BY votes");
                                        
                                        if($query->num_rows > 0) 
                                            while($elecresults = $query->fetch_assoc()){
                                                
                                        ?>
										<tr class="odd gradeX">
										    <td><img style="width:50px; heigth:50px;" src="../assets/img/blog/<?php echo $elecresults['profilepic']; ?>" alt="<?php echo $elecresults['name']; ?>" srcset=""></td>
											<td><?php echo $elecresults['name']; ?></td>
											<td><?php echo $elecresults['position']; ?></td>
											<td><?php echo $elecresults['votes']; ?></td>
											<td><?php echo $elecresults['party']; ?></td>	
											<td><a href="delete-results.php?type_id=<?php echo $type; ?>&candidate_id=<?php echo $elecresults['candidate_id']; ?>" style="margin: 5px;" class="btn btn-danger">Delete results</a> <a href="update-results.php?candidate_id=<?php echo $elecresults['candidate_id']; ?>&type_id=<?php echo $type; ?>" style="margin: 5px;" class="btn btn-inverse">Update results</a>  </td>
										</tr>
                                        <?php } ?>
									
									</tbody>
									<tfoot>
									        <th>Candidate Profile</th>
											<th>Candidate</th>
											<th>Position</th>
											<th>Votes</th>
											<th>Party</th>
                                            <th>action</th>
									</tfoot>
								</table>
							</div>
						</div><!--/.module-->

					<br />
						
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
	<script src="scripts/jquery-1.9.1.min.js"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>