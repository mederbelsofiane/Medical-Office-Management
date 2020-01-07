<?php include "php/database.php" ?>
<?php include "php/secretaire.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init.php') ?>
<?php
$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }

  // if there were no errors, try to login

    $secretaire = Secretaire::find_by_username($username);
    // test if admin found and password is correct
    if($secretaire != false && $secretaire->verify_password($password)) {
      // Mark admin as logged in
      $session_secretaire->login($secretaire);
      redirect_to('admin/index.php');
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
  <title>LoginS</title>
</head>
<body id="secretaire-background">

  <div class="container">
      <div class="row justify-content-md-center">

        <div class=" col-md-4 col-md-offset-4 col-xs-12 ">
          <?php echo display_errors($errors); ?>

        <div id="form-background">

        <form action="secretaireLogin.php" class="login-form" method="post">
          <div class="form">
            <legend><h2 class="text-center">Se connecter</h2></legend>
            <hr>
            <div class="form-group">
              <label for="exampleInputEmail1" class="font-weight-bold">Username :</label>
              <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="" class="font-weight-bold">Password :</label>
              <input type="password"  name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class=" form-control btn btn-success">Se connecter</button>
          </div>
       </form>
     </div>
       </div>
     </div>
   </div>
</body>
</html>
