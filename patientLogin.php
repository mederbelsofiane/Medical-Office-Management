<?php include "php/database.php" ?>
<?php include "php/patient.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init_patient.php') ?>
<?php
$errors = [];
$email = '';
$pass = '';

if(is_post_request()) {

  $email = $_POST['email'] ?? '';
  $pass = $_POST['pass'] ?? '';

  // Validations
  if(is_blank($email)) {
    $errors[] = "email cannot be blank.";
  }
  // if(is_blank($pass)) {
  //   $errors[] = "Password cannot be blank.";
  // }

  // if there were no errors, try to login

    $patient = Patient::find_by_email($email);
    // test if admin found and pass is correct
    if($patient != false && ($pass==$patient->pass)) {
      // Mark admin as logged in
      $session_patient->login($patient);

      redirect_to('patient/index.php');
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="ressources/css/loginstyle.css">
  <title>LoginP</title>
</head>
<body id="patient-background">

  <div class="container">
      <div class="row justify-content-md-center">
        <div class=" col-md-4 col-md-offset-4 col-xs-12 ">
              <?php echo display_errors($errors); ?>
        <div id="form-background">
        <form action="patientLogin.php" class="login-form" method="post">
          <div class="form">
            <legend><h2 class="text-center">Se connecter</h2></legend>
            <hr>
            <div class="form-group">
              <label for="" class="font-weight-bold">Email address :</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="" class="font-weight-bold">Password :</label>
              <input type="password"  name="pass" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="submit"class=" form-control btn btn-success">Se connecter</button>
          </div>
       </form>
     </div>
       </div>
     </div>
   </div>
</body>
</html>
