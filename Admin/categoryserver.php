<?php 

    require('dbcon.php');

    // If upload button is clicked ...
  if (isset($_POST['add']) ) {
  
  	// Get text
      $categoryname =  mysqli_real_escape_string($db,$_POST["categoryname"]); 
   
     

  	  $sql = "INSERT INTO categories (categoryname) VALUES ( '$categoryname') ";
  	
        $query_run = mysqli_query($db,$sql);
  	if ($query_run ) {
 
        $_SESSION['status']= "Category added successfully";
        $_SESSION['more']= "success";
        $_SESSION['status_code']= "success";
        
        

  	}else{
        $_SESSION['status']= "category not added";
        $_SESSION['more']= "please contact admin support";
        $_SESSION['status_code']= "error";
       
        
  	}


  }

  


  ?>