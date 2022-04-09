<?php

include "dbcon.php"; // Using database connection file here

 $position_id = $_GET['position_id']; // get id through query string
 $type_id = $_GET['election_id']; // get id through query string
 $del = mysqli_query($db,"delete from positions where position_id = '$position_id'"); // delete query
    if($del)
    {
       
    
        header("location: positions.php?type_id=$type_id&status=successfully deleted&more=election 2022&status_code=success"); 
    }
    else
    {  
        header("location: positions.php?type_id=$type_id&status=Error deleting record!&more=Kindly contact admin&status_code=error"); 
        // display error message if not delete
    }
   

?>