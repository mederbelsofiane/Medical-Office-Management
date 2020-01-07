<?php include "../php/database.php" ?>
<?php include "../php/secretaire.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login(); // doit etre connecter pour afficher la page sinon redirection vers login ?>

<?php
if(is_post_request()) {

  $args = $_POST['secretaire'];//
  $secretaire = new Secretaire($args);

  $result = $secretaire->ajouter();
  if ($result) {
    // code...

  $new_id = $secretaire->id_secretaire;

    $_SESSION['message'] = 'la secretaire a était crée.';
    redirect_to('secretaireDetail.php?id_secretaire=' . $new_id);
}else {
}
} else {
  // display the form
  $secretaire = new Secretaire;
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
  <body>
    <?php
    include'../html/admin/navbar.php'
      ?>
      <section style="background-color:#eee;">

      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col-md-8 ml-3">
                <div class=" text-info mb-3">
                  <a href="<?php echo ('secretaires.php'); ?>">&laquo; Back to secretaires</a><br>
                </div>

                    <?php echo display_errors($secretaire->errors); ?>
                <form action="ajouterSecretaire.php" method="post" style="  border:2px solid #5D6D7E ;
                   box-shadow: 0px 4px 6px 6px #5D6D7E ;
                  border-radius: 5px;
                  align-self: center;" class="border border-secondary rounded  p-3">
                  <div class="text-info mb-2">

                  <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Ajouter une Secretaire</h3>

                </div>
                  <?php include "forms/form_secretaire.php" ?>
                  <button type="submit" class="form-control btn btn-info">Ajouter une secretaire</button>
                </form>
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
          <br>
          <br>
          <br>

    </section>





       <script src="../bootstrap/js/jquery.min.js" ></script>
       <script src="../bootstrap/js/popper.min.js"></script>
       <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
