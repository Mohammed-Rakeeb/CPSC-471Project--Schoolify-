<?php
session_start();

// initializing variables
$Firstname = "";
$Lastname    = "";

$Address = "";
$cardNumber  = "";
$username = "";
$email    = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'buyer');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Firstname = mysqli_real_escape_string($db, $_POST['Firstname']);
  $Lastname = mysqli_real_escape_string($db, $_POST['Lastname']);
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $cardNumber = mysqli_real_escape_string($db, $_POST['cardNumber']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $users = mysqli_fetch_assoc($result);
  
  if ($users) { // if user exists
    if ($users['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($users['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (Firstname,Lastname,Address,cardNumber,Username, email, password) 
  			  VALUES('$Firstname','$Lastname','$Address','$cardNumber','$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
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
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location:index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>
