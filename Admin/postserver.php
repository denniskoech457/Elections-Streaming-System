<?php 

    require('dbcon.php');

 

     // If upload button is clicked ...
     if (isset($_POST['post-results']) ) {
      // Get image name
      $profilepic = $_FILES['profilepic']['name'];
      // Get text
      $name =  mysqli_real_escape_string($db,$_POST["name"]); 
      $position =  mysqli_real_escape_string($db,$_POST["position"]); 
      $party = $_POST["party"];
      $type = $_POST["type"];

      // image file directory
      $target = "../assets/img/blog/".basename($profilepic);

      $sql = "INSERT INTO candidates (name, position, party, profilepic, type_id) VALUES ('$name', '$position', '$party', '$profilepic', '$type') ";
      // execute query
      $uploads = move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);
      $query_run = mysqli_query($db,$sql,$uploads);
     
      if ($query_run  ) {
            
    
      $_SESSION['status']= "Results Posted successfully";
      $_SESSION['more']= "ELECTION 2022";
      $_SESSION['status_code']= "success";
     
      
      

      }else{
      $_SESSION['status']= "Results not Posted successfully";
      $_SESSION['more']= "please contact admin, there is a problem";
      $_SESSION['status_code']= "error";
      
     
  
      }


}

     // If upload button is clicked ...
     if (isset($_POST['election-position']) ) {
      $positionadd =  mysqli_real_escape_string($db,$_POST["positionadd"]); 
      $typeid =  mysqli_real_escape_string($db,$_POST["typeid"]); 
      $sql = "INSERT INTO positions ( position, election_id ) VALUES ('$positionadd', '$typeid') ";
      // execute query
      $query_run = mysqli_query($db,$sql);
        if ($query_run){
          header("location: positions.php?type_id=$typeid&status=$positionadd Created successfully&more=ELECTION 2022&status_code=success"); 
        }else{
    
          header("location: add-positions.php?type_id=$typeid&status=$positionadd not created successfully&more=ELECTION 2022&status_code=error");
        }
    
    
    }
       // If upload button is clicked ...
       if (isset($_POST['election-type']) ) {
        $type =  mysqli_real_escape_string($db,$_POST["type"]); 
        $sql = "INSERT INTO elections ( type ) VALUES ( '$type') ";
        // execute query
        $query_run = mysqli_query($db,$sql);
          if ($query_run){
            header("location: index.php?status=$type Created successfully&more=ELECTION 2022&status_code=success"); 
          }else{
      
            header("location: create-election.php?status=$type not created successfully&more=ELECTION 2022&status_code=error");
          }
      
      
      }
   // If upload button is clicked ...
   if (isset($_POST['updateresults']) ) {
  
    // Get text
    $candidate_id=$_POST["candidate_id"];
    $votes = $_POST["votes"]; 

    $sql = "UPDATE candidates SET votes='".$votes."' where candidate_id='".$candidate_id."'  ";
    // execute query

    if (mysqli_query($db, $sql)) {
        
      header("location: update-results.php?candidate_id=$candidate_id&status=Updated successfully&more=ELECTION 2022&status_code=success");
     
      
    }else{
      $_SESSION['status']= "update not successfully";
      $_SESSION['more']= "please contact admin, there is a problem";
      $_SESSION['status_code']= "error";
    }


}
  




   



  ?>