<?php

include "dbcon.php"; // Using database connection file here
$type_id = $_GET['type_id']; 
$candidate_id = $_GET['candidate_id']; // get id through query string
$del = mysqli_query($db,"delete from candidates where candidate_id = '$candidate_id'"); // delete query

    if($del)
    {
        mysqli_close($db ); // Close connection
        // redirects to all records page
    
        $_SESSION['status']= "successfully deleted";
        $_SESSION['more']= "Elections 2022";
        $_SESSION['status_code']= "success";
        header("location: election.php?type_id=$type_id"); 
    }
    else
    {   $_SESSION['status']= "Error deleting record";
        $_SESSION['more']= "contact admin $candidate_id";
        $_SESSION['status_code']= "error";
        header("location: admin-list.php"); 
        // display error message if not delete
    }
   

?>