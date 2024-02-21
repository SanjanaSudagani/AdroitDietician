<?php
session_start();

// initializing variables
$username = "";
$email    = "";

$fname = "";
$age    = "";
$ht = "";
$wt    = "";
$act = "";
$wh    = "";
$health1 = "";
$health2 = "";
$health3 = "";

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
  $user_check_query = "SELECT * FROM user_login WHERE username='$username' OR email='$email' LIMIT 1";
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

  	$query = "INSERT INTO user_login (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	header('location: uinfo.php');
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
        $query = "SELECT * FROM user_login WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: uindex.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }


  if (isset($_POST['save_uinfo'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $ht = mysqli_real_escape_string($db, $_POST['ht']);
    $wt = mysqli_real_escape_string($db, $_POST['wt']);
    $act = mysqli_real_escape_string($db, $_POST['act']);
    $wh = mysqli_real_escape_string($db, $_POST['wh']);
    $health1 = mysqli_real_escape_string($db, $_POST['health1']);
    $health2 = mysqli_real_escape_string($db, $_POST['health2']);
    $health3 = mysqli_real_escape_string($db, $_POST['health3']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fname)) { array_push($errors, "Fullname is required"); }
    if (empty($age)) { array_push($errors, "Age is required"); }
    if (empty($ht)) { array_push($errors, "Height is required"); }
    if (empty($wt)) { array_push($errors, "Weight is required"); }
    if (empty($act)) { array_push($errors, "Enter none if not applicable"); }
    if (empty($wh)) { array_push($errors, "Working Hours are required"); }
    if (empty($health1)) { array_push($errors, "Enter none if not applicable"); }
    if (empty($health2)) { array_push($errors, "Enter none if not applicable"); }
    if (empty($health3)) { array_push($errors, "Enter none if not applicable"); }

    $user_check_query = "SELECT * FROM user_info WHERE  fullname='$fname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if (count($errors) == 0) {
      $query = "INSERT INTO user_info (fullname, age, height, weight, activities, workinghrs, health1,health2,health3)
  			  VALUES('$fname', '$age', '$ht','$wt', '$act', '$wh','$health1','$health2','$health3')";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Your information is saved";
  	header('location: uindex.php');
    }
  
  }
  

  if (isset($_POST['update_uinfo'])) {
    $uname=$_SESSION['username'];
    $result = mysqli_query($db,"SELECT id FROM user_login NATURAL JOIN user_info where username='$uname'"); 
while ($row = $result->fetch_assoc()) {
  $id=$row['id'];
}

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $ht = mysqli_real_escape_string($db, $_POST['ht']);
    $wt = mysqli_real_escape_string($db, $_POST['wt']);
    $act = mysqli_real_escape_string($db, $_POST['act']);
    $wh = mysqli_real_escape_string($db, $_POST['wh']);
    $health1 = mysqli_real_escape_string($db, $_POST['health1']);
    $health2 = mysqli_real_escape_string($db, $_POST['health2']);
    $health3 = mysqli_real_escape_string($db, $_POST['health3']);

    if (empty($fname)) { array_push($errors, "Fullname is required"); }
    if (empty($age)) { array_push($errors, "Age is required"); }
    if (empty($ht)) { array_push($errors, "Height is required"); }
    if (empty($wt)) { array_push($errors, "Weight is required"); }
    if (empty($act)) { array_push($errors, "Enter none if not applicable"); }
    if (empty($wh)) { array_push($errors, "Working Hours are required"); }
    if (empty($health1)) { array_push($errors, "Enter none if not applicable"); }
    if (empty($health2)) { array_push($errors, "Enter none if not applicable"); }
    if (empty($health3)) { array_push($errors, "Enter none if not applicable"); }

    

    if (count($errors) == 0) {
      $query = "UPDATE user_info 
      SET fullname = '$fname', age= '$age',height = '$ht', weight= '$wt',activities = '$act', workinghrs= '$wh',health1 = '$health1',health2 = '$health2',health3 = '$health3'
      WHERE id='$id';";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Your information is updated";
  	header('location: uindex.php');
    }

  }

  if (isset($_POST['view_uinfo'])) {
  $fname= mysqli_real_escape_string($db, $_POST['fname']);
  if (empty($fname)) { array_push($errors, "Fullname is required"); }
  if (count($errors) == 0) {
  $user_check_query = "SELECT * FROM user_info WHERE fullname='$fname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['fullname'] !== $fname) {
      array_push($errors, "Fullname doesnot exist");
    }
  }
}}
if (isset($_POST['ok'])) {
  header('location: viewuser.php');
}
if (isset($_POST['back'])) {
  header('location: dindex.php');
}
if (isset($_POST['va'])) {
  header('location: dietplan1.php');
}
if (isset($_POST['backp'])) {
  header('location: uindex.php');
}
if (isset($_POST['va1'])) {
  header('location: dietplan.php');
}
if (isset($_POST['backp1'])) {
  header('location: uindex.php');
}

?>