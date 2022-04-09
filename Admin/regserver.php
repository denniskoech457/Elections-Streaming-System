<?php


// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$status = "";

// connect to the database
require('dbcon.php');


// REGISTER USER
if (isset($_POST['signup'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
 
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
    $status = "error";
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "$username already exists");
      $status = "error";
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO admin (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
  
    $_SESSION['status']= "$username Registered successfully";
    $_SESSION['more']= "ELECTION 2022 ";
    $_SESSION['status_code']= "success";
    header('location: index.php?INFO=REGISTERED+NOW+LOGIN');
  
  }
}

// LOGIN USER
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
        $status = "warning";
        header('location: login.php');
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
        $status = "warning";
        header('location: login.php');
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $askdata = $db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

        if($askdata->num_rows > 0) 
            while($recent = $askdata->fetch_assoc()){ 
                $username = $recent['username'];
                $sessionid = $recent['admin_id'];
                $_SESSION['username'] = $username;
                $_SESSION['admin_id'] = $sessionid;
            }

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['password'] = $password;
            $_SESSION['status']= "login successfully";
            $_SESSION['more']= "ELECTION 2022";
            $_SESSION['status_code']= "success";
          header('location: index.php?status=login successfully&more=ELECTION 2022&status_code=success');
        }else {
            array_push($errors, "Wrong username or password ");
            $status = "error";
            
            header('location: login.php?status=Wrong username or password &more=ELECTION 2022&status_code=error');
        }
    }
  }
  
  ?>



