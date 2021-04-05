<?php

// initializing variables
$companyname = "";
$businessemail    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 
  'Ceramic_Hub');



// ... 

// LOGIN USER


if (isset($_POST['com_reg'])) {
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);

  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);

  $companyname = mysqli_real_escape_string($db, $_POST['companyname']);

  $businessemail = mysqli_real_escape_string($db, $_POST['businessemail']);

  $companyaddress = mysqli_real_escape_string($db, $_POST['companyaddress']);

  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);






  if (empty($firstname)) {
    array_push($errors, "First Name is required");
  }

if (empty($lastname)) {
    array_push($errors, "Last Name is required");
  }

  if (empty($companyname)) {
    array_push($errors, "Company Name is required");
  }

if (empty($businessemail)) {
    array_push($errors, "businessemail is required");
  }

if (empty($companyaddress)) {
    array_push($errors, "companyaddress is required");
  }

if (empty($password_1)) {
    array_push($errors, "password is required");
  }

 if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

$cmp_check_query = "SELECT * FROM `company_reg` WHERE firstname='$firstname' OR lastname='$lastname' OR businessemail='$businessemail' LIMIT 1";
  $result = mysqli_query($db, $cmp_check_query);
  $cmp = mysqli_fetch_assoc($result);
  
  if ($cmp) { // if user exists
    if ($cmp['firstname'] === $firstname) {
      array_push($errors, "firstname already exists");
    }
    if ($cmp['lastname'] === $lastname) {
      array_push($errors, "lastname already exists");
    }
    if ($cmp['businessemail'] === $businessemail) {
      array_push($errors, "businessemail already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO `company_reg`(firstname, lastname, companyname, businessemail, companyaddress, password) 
          VALUES('$firstname', '$lastname', '$companyname', '$businessemail', '$companyaddress', '$password')";
    mysqli_query($db, $query);
    $_SESSION['companyname'] = $companyname;
    header('location:./dashboard.php');
  }
}



// ... 

// LOGIN USER


if (isset($_POST['cmp_login'])) {
  $companyname = mysqli_real_escape_string($db, $_POST['companyname']);
  $businessemail = mysqli_real_escape_string($db, $_POST['businessemail']);
  
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($companyname)) {
    array_push($errors, "companyname is required");
  }

   if (empty($businessemail)) {
    array_push($errors, "businessemail is required");
  }

 if (empty($password_1)) {
    array_push($errors, "password is required");
  }

 if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");

}
  if (count($errors) == 0) {
    $password= md5($password_1);
    $query = "SELECT id,companyname, businessemail, password FROM `company_reg` WHERE companyname='$companyname' AND businessemail='$businessemail' AND password='$password'"; 
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      
 
      $row=mysqli_fetch_array($results);
      $id=$row['id'];
      $company_name=$row['companyname'];
      

session_unset();
session_start();

      $_SESSION['companyname'] = $company_name;


      

      $_SESSION['c_id']=$id;

     
      
      header('location:./dashboard.php');
    }else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}




?>












