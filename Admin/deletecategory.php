<?php

include "dbcon.php"; // Using database connection file here

$category_id = $_GET['category_id']; // get id through query string
$category= $_GET['categoryname'];
$catedel = mysqli_query($db,"delete from categories where category_id = '$category_id'"); // delete query

    if($catedel)
    {
        mysqli_close($db ); // Close connection
        // redirects to all records page
    
        $_SESSION['status']= " $category successfully deleted ";
        $_SESSION['more']= "explore your limits ";
        $_SESSION['status_code']= "success";
        header("location: categories.php"); 
    }
    else
    {   $_SESSION['status']= "Error deleting  $category";
        $_SESSION['more']= "contact admin ";
        $_SESSION['status_code']= "error";
        header("location: categories.php"); 
        // display error message if not delete
    }
   

?>