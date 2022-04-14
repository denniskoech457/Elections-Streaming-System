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
        if (isset($_POST['add-constituency']) ) {
          $const_name =  mysqli_real_escape_string($db,$_POST["const_name"]); 
          $typeid =  mysqli_real_escape_string($db,$_POST["typeid"]); 
          $sql = "INSERT INTO constituency ( const_name, election_id ) VALUES ('$const_name', '$typeid') ";
          // execute query
          $query_run = mysqli_query($db,$sql);
            if ($query_run){
              header("location: constituencies.php?type_id=$typeid&status=$const_name Created successfully&more=ELECTION 2022&status_code=success"); 
            }else{
        
              header("location: add-constituency.php?type_id=$typeid&status=$positionadd not created successfully&more=ELECTION 2022&status_code=error");
            }
        
        
        }

           // If upload button is clicked ...
           if (isset($_POST['add-wards']) ) {
            $const_id =  mysqli_real_escape_string($db,$_POST["consti_id"]); 
            $typeid =  mysqli_real_escape_string($db,$_POST["typeid"]); 
            $ward =  mysqli_real_escape_string($db,$_POST["ward"]); 
            $sql = "INSERT INTO wards ( ward, consti_id, election_id ) VALUES ('$ward', '$const_id', '$typeid') ";
            // execute query
            $query_run = mysqli_query($db,$sql);
              if ($query_run){
                header("location: wards.php?consti_id=$const_id&type_id=$typeid&status=$const_name Created successfully&more=ELECTION 2022&status_code=success"); 
              }else{
          
                header("location: add-wards.php?consti_id=$const_id&type_id=$typeid&status=$const_name not created successfully&more=ELECTION 2022&status_code=error");
              }
          
          
          }
         
            // If upload button is clicked ...
          if (isset($_POST['add-ward-candidate']) ) {
            $const_id =  mysqli_real_escape_string($db,$_POST["consti_id"]); 
            
            $ward_id =  mysqli_real_escape_string($db,$_POST["ward_id"]); 
            // Get image name
            $profilepic = $_FILES['profilepic']['name'];
            // Get text
            $name =  mysqli_real_escape_string($db,$_POST["name"]); 
            $position =  mysqli_real_escape_string($db,$_POST["position"]); 
            $party = $_POST["party"];
            $type = $_POST["type"];

            // image file directory
            $target = "../assets/img/blog/".basename($profilepic);

            $sql = "INSERT INTO candidates (name, position, party, profilepic, type_id, ward_id, consti_id) VALUES ('$name', '$position', '$party', '$profilepic', '$type', '$ward_id', '$const_id') ";
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
  
  // If upload button is clicked ...
  if (isset($_POST['updatewardresults']) ) {
  
    // Get text
    $candidate_id=$_POST["candidate_id"];
    $ward_id=$_POST["ward_id"];
    $votes = $_POST["votes"]; 

    $sql = "UPDATE candidates SET votes='".$votes."' where candidate_id='".$candidate_id."' AND ward_id='".$ward_id."'  ";
    // execute query

    if (mysqli_query($db, $sql)) {
        
      header("location: update-ward-results.php?candidate_id=$candidate_id&ward_id=$ward_id&status=Updated successfully&more=ELECTION 2022&status_code=success");
     
      
    }else{
      $_SESSION['status']= "update not successfully";
      $_SESSION['more']= "please contact admin, there is a problem";
      $_SESSION['status_code']= "error";
    }


}



   



  ?>