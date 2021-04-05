<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 
  'Ceramic_Hub');

// REGISTER USER
if (isset($_POST['reg_u'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Name is required"); }
  if (empty($phone_number)) { array_push($errors, "Email is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `users` WHERE username='$username' OR email='$email' LIMIT 1";
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

    $query = "INSERT INTO `users`(username, phone_number, email, password) 
          VALUES('$username', '$phone_number',  
          '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    header('location:./index.php');
  }
}


// ... 

// LOGIN USER


if (isset($_POST['login_usr'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT id,email FROM `users` WHERE email='$email' AND password='$password'"; 
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      
 
      $row=mysqli_fetch_array($results);
      $id=$row['id'];
      $usr_name=$row['username'];
      

session_unset();
session_start();

      $_SESSION['username'] = $usr_name;


      

      $_SESSION['u_id']=$id;

     
      
      header('location:./index.php');
    }else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}

?>












