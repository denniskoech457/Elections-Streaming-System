<?php

include "dbcon.php"; // Using database connection file here

$id = $_GET['admin_id']; // get id through query string

// Get records from the database
$query = $db->query("SELECT * FROM admin  ");
    if($query->num_rows > 2)
    {
        $del = mysqli_query($db,"delete from admin where admin_id = '$id'"); // delete query
        mysqli_close($db ); // Close connection
        // redirects to all records page
    
        header("location: admin-list.php?status=successfully deleted&more=election 2022&status_code=success"); 
    }
    else
    {  
        header("location: admin-list.php?status=Error deleting record!&more= You cannot delete when admins are less than two. Kindly contact admin&status_code=error"); 
        // display error message if not delete
    }
   

?>