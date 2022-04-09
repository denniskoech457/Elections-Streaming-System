
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
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <script src="../assets/js/sweetalert.min.js"></script>
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
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
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="create-election.php" class="btn-box big span4"><i class=" icon-random"></i>
                                        <p class="text-muted">
                                            + CREATE ELECTION </p>
                                    </a>
                                    <a href="admin-list.php" class="btn-box big span4"><i class=" icon-user"></i>
                                        <p class="text-muted">
                                            + ADMINS </p>
                                    </a>
                                    
                                    <?php
                                        // Include the database configuration file
                                        include 'dbcon.php';
                                        
                                        // Get records from the database
                                        $query = $db->query("SELECT * FROM elections  ORDER BY type_id");
                                        
                                        if($query->num_rows > 0) 
                                            while($elecresults = $query->fetch_assoc()){
                                                
                                        ?>
                                        <div class="btn-box big span4">
                                        <a href="election.php?type_id=<?php echo $elecresults['type_id']; ?>" ><i class="icon-group"></i>
                                            <p class="text-muted">
                                            <?php echo $elecresults['type']; ?></p>
                                        </a>
                                        <br>
                                        <br>
                                        <a class="btn btn-danger" href="delete-election.php?type_id=<?php echo $elecresults['type_id']; ?>">Delete</a>
                                       </div>
                                    <?php } ?>
                                   
                                </div>
                                
                            </div>
                            <!--/#btn-controls-->
                            
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 Election 2022 </b>All rights reserved.
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
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
