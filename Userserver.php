<?php
session_start();

// initializing variables
$Firstname = "";
$Lastname    = "";
$DateofBirth = "";
$Male = "";
$Female = "";
$phone    = "";
$Address= "";
$cardNumber   = "";
$date= "";
$email    = "";
$password= "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'buyer') or die("cant connect to database");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Firstname = mysqli_real_escape_string($db, $_POST['Firstname']);
  $Lastname = mysqli_real_escape_string($db, $_POST['Lastname']);
  $DateofBirth = mysqli_real_escape_string($db, $_POST['DateofBirth']);
  $Male = mysqli_real_escape_string($db, $_POST['Male']);
  $Female= mysqli_real_escape_string($db, $_POST['Female']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $cardNumber = mysqli_real_escape_string($db, $_POST['cardNumber ']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);
 

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM buyerform WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $buyerform = mysqli_fetch_assoc($result);
  
  if ($buyerform) { // if user exists
   
    if ($buyerform['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password1);//encrypt the password before saving in the database

  	$query = "INSERT INTO buyerform (Firstname,Lastname,Date of Birth,Gender,Phone,Current Address,Cardnumber,Expiry, email, password) 
  			  VALUES('$Firstname', '$Lastname', '$DateofBirth','$Gender', '$phone', '$Address','$cardNumber', '$expiry','$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}