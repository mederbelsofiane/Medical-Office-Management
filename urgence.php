<?php include "php/database.php" ?>
<?php include "php/urgence.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init.php') ?>
<?php
if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['urgence'];
  $urgence = new Urgence($args);

  $result = $urgence->ajouter();
  $new_id = $urgence->id_urgence;

    $_SESSION['message'] = 'une urgence a était crée.';
    redirect_to('index.php');

} else {
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ajouterUrgence</title>
    <link rel="stylesheet" href="ressources/css/loginstyle.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="fontawesome/js/all.js"></script>
    <style>
    body{
          background: rgba(200, 05, 23, 0.60 );
          opacity:  0.94 ;
    }
    </style>
</head>
<body>
<section >
  <div class="container ">
        <div class="col-xl-11 col-lg-9 col-md-8 m-auto">
            <div id="form-background">
            <form action="urgence.php" method="post"
            class="border border-secondary rounded login-form  p-3">
            <div class=" text-danger">
                <legend><i class="far fa-plus-square fa-2x d-inline float-left mr-2 "></i><h3 class="pt-1"> Ajouter une urgence .</h3></legend>
            </div>
            <br>

              <?php include "admin/forms/form_urgence.php" ?>
              <button type="submit" class="btn btn-danger form-control">Ajouter l'urgence</button>
            </form>
          </div>
          </div>
      <div class="col-md-2">
      </div>
      <div class="col-md-5">
      </div>
    </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</section>

   <script src="../bootstrap/js/jquery.min.js" ></script>
   <script src="../bootstrap/js/popper.min.js"></script>
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
