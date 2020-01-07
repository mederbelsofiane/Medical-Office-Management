<?php include "../php/database.php" ?>
<?php include "../php/secretaire.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
<?php

if(!isset($_GET['id_secretaire'])){
  redirect_to('profile.php');
}
$id_secretaire = $_GET['id_secretaire'];
$secretaire = Secretaire::find_by_id($id_secretaire);
if($secretaire == false) {
  redirect_to('index.php');
}
if(is_post_request()) {

  $args = $_POST['secretaire'];

  $secretaire->merge_attributes($args);
  $result = $secretaire->update();
  if ($result) {
    // code...

    $_SESSION['message'] = 'le secretaire a était modifier.';
    redirect_to('secretaireDetail.php?id_secretaire=' . $id_secretaire);
  }

}
else {
  // display the form
  $secretaires = new Secretaire;
}

?>





<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../ressources/css/style_admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../fontawesome/js/all.js"></script>
    <style media="screen">
    @media (max-width: 768px) {
      .sidebar {
        position: static;
        height: auto;
      }

      .top-navbar {
        position: static;
      }
    }
    </style>
  </head>
  <body >
    <?php
    include'../html/admin/navbar.php'
      ?>
      <section>

      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col-md-8 ml-3">
                <div class=" text-warning mb-3">
                  <a href="<?php echo ('secretaires.php'); ?>">&laquo; Back to secretaires</a><br>
                    <?php echo display_errors($secretaire->errors); ?>
                </div>

                <form action="<?php echo ('modifierSecretaire.php?id_secretaire=' . h(u($id_secretaire))); ?>" method="post"
                  enctype="multipart/form-data" style="  border:2px solid #5D6D7E ;
                     box-shadow: 0px 4px 6px 6px #5D6D7E ;
                    border-radius: 5px;
                    align-self: center;" class="border border-secondary rounded   p-3">
                  <div class="text-warning mb-2">

                  <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Modifer la Secretaire</h3>
                </div>

                  <?php include "forms/form_secretaire.php" ?>
                  <button type="submit" class="form-control btn btn-warning">Modifer la secretaire</button>

                </form>

              </div>

          <div class="col-md-2">


          </div>
          <div class="col-md-5">



          </div>
        </div>

          </div>

        </div>

      </div>

    </section>






       <script src="../bootstrap/js/jquery.min.js" ></script>
       <script src="../bootstrap/js/popper.min.js"></script>
       <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
