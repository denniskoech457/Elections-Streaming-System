<?php

include "dbcon.php"; // Using database connection file here

$type_id = $_GET['type_id']; // get id through query string

$delelections = mysqli_query($db,"delete from elections where type_id = '$type_id'"); // delete query
$delcandidates = mysqli_query($db,"delete from candidates where type_id = '$type_id'"); // delete query

$del = mysqli_query($delelections, $delcandidates);
    if($del)
    {
        mysqli_close($db ); // Close connection
        // redirects to all records page

        header("location: index.php?status=Deleted successfully&more=ELECTION 2022&status_code=success"); 
    }
    else
    {   
        header("location: index.php?status=Error deleting&more=ELECTION 2022&status_code=warning"); 
        // display error message if not delete
    }
   

?>