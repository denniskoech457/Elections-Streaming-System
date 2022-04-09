
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
	<title>Edmin</title>
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
                     <p><a href="index.php">home</a> / Admins</p>
				
                          <a class="btn btn-primary" href="signup.php">ADD NEW ADMIN</a>
						<div class="module">
							<div class="module-head">
								<h3>all admins</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
										    <th>admin id</th>
											<th>name</th>
                                            <th>remove</th>
											
										</tr>
									</thead>
									<tbody>
                                    <?php
                                        // Include the database configuration file
                                        include 'dbcon.php';
                                        
                                        // Get records from the database
                                        $query = $db->query("SELECT * FROM admin ORDER BY admin_id");
                                        
                                        if($query->num_rows > 0) 
                                            while($admin = $query->fetch_assoc()){
												$password = $admin ['password'];
                                                
                                        ?>
										<tr class="odd gradeX">
										    <td><?php echo $admin['admin_id']; ?></td>
											<td><?php echo $admin['username']; ?></td>
											
											
											
                                            <td><a href="delete-admin.php?admin_id=<?php echo $admin['admin_id']; ?>" style="margin: 5px;" class="btn btn-danger">REMOVE</a>  </td>
										</tr>
                                        <?php } ?>
									
									</tbody>
									<tfoot>
                                    <th>admin id</th>
                                    <th>name</th>
                                    <th>remove</th>
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
			 

			<b class="copyright">&copy;2022 Election 2022</b> All rights reserved.
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