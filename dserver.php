<?php
session_start();

// initializing variables
$username = "";
$email    = "";

$fname = "";
$qual    = "";
$loc = "";
$add    = "";
$sh = "";
$ch    = "";
$st = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', 'user');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM diet_login WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO diet_login (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: dinfo.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM diet_login WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: dindex.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  if (isset($_POST['save_dinfo'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $qual = mysqli_real_escape_string($db, $_POST['qual']);
    $loc = mysqli_real_escape_string($db, $_POST['loc']);
    $add = mysqli_real_escape_string($db, $_POST['add']);
    $sh = mysqli_real_escape_string($db, $_POST['sh']);
    $ch = mysqli_real_escape_string($db, $_POST['ch']);
    $st = mysqli_real_escape_string($db, $_POST['st']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fname)) { array_push($errors, "Fullname is required"); }
    if (empty($qual)) { array_push($errors, "Qualification is required"); }
    if (empty($loc)) { array_push($errors, "Location is required"); }
    if (empty($add)) { array_push($errors, "Address is required"); }
    if (empty($sh)) { array_push($errors, "Starting Hour id required"); }
    if (empty($ch)) { array_push($errors, "Closing Hour is required"); }
    if (empty($st)) { array_push($errors, "Status is required"); }

    if (count($errors) == 0) {
      $query = "INSERT INTO diet_info (fullname, qualification, location, address, sh, ch, status)
  			  VALUES('$fname', '$qual', '$loc','$add', '$sh', '$ch','$st')";
  	mysqli_query($db, $query);
  	header('location: dindex.php');
    }
  }
  
  if (isset($_POST['update_dinfo'])) {
    $uname=$_SESSION['username'];
    $result = mysqli_query($db,"SELECT id FROM diet_login NATURAL JOIN diet_info where username='$uname'"); 
  while ($row = $result->fetch_assoc()) { 
  $id=$row['id'];
  }
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $qual = mysqli_real_escape_string($db, $_POST['qual']);
    $loc = mysqli_real_escape_string($db, $_POST['loc']);
    $add = mysqli_real_escape_string($db, $_POST['add']);
    $sh = mysqli_real_escape_string($db, $_POST['sh']);
    $ch = mysqli_real_escape_string($db, $_POST['ch']);
    $st = mysqli_real_escape_string($db, $_POST['st']);

    if (empty($fname)) { array_push($errors, "Fullname is required"); }
    if (empty($qual)) { array_push($errors, "Qualification is required"); }
    if (empty($loc)) { array_push($errors, "Location is required"); }
    if (empty($add)) { array_push($errors, "Address is required"); }
    if (empty($sh)) { array_push($errors, "Starting Hour id required"); }
    if (empty($ch)) { array_push($errors, "Closing Hour is required"); }
    if (empty($st)) { array_push($errors, "Status is required"); }
    
    if (count($errors) == 0) {
      $query = "UPDATE diet_info 
      SET fullname = '$fname', qualification= '$qual',location = '$loc', address= '$add',sh = '$sh', ch= '$ch',status = '$st'
      WHERE id='$id';";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Your information is updated";
  	header('location: dindex.php');
    }
  }

  if (isset($_POST['view_dinfo'])) {
    $loc= mysqli_real_escape_string($db, $_POST['loc']);
    if (empty($loc)) { array_push($errors, "Location is required"); }
    
    if (count($errors) == 0) {
    $user_check_query = "SELECT * FROM diet_info WHERE location='$loc'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    }
  }

  
  if (isset($_POST['back'])) {
    header('location: uindex.php');
  }
  

  ?>