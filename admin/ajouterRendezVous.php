<?php include "../php/database.php" ?>
<?php include "../php/rendez-vous.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
<?php
if(is_post_request()){

    // Create record using post parameters
    $args = $_POST['rendez_vous'];

    $rendez_vous = new RendezVous($args);

    $result = $rendez_vous->ajouter();


      if ($result) {
      $new_id = $rendez_vous->id_patient;

        $_SESSION['message'] = 'le rendez vous a était crée.';
        redirect_to('patientDetail.php?id_patient=' . $new_id);
      }else {
        echo "failed";
      }

  } else {
    // display the form
    $rendez_vous = [];
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ajouterRendezVous</title>
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
  <section style="background-color:#eee;" >
  <div class="container-fluid ">
    <div class="row">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row pt-md-5 mt-md-3 mb-5">
          <div class="col-md-8 ml-3">
            <div class=" text-info mb-3">
              <a href="<?php echo ('rendez-vous.php'); ?>">&laquo; Back to rendez-vous</a><br>
            </div>
            <form action="ajouterRendezVous.php" method="post" style="  border:2px solid #5D6D7E ;
               box-shadow: 0px 4px 6px 6px #5D6D7E ;
              border-radius: 5px;
              align-self: center;"
                  class="border border-secondary rounded   p-3">
                  <div class="text-info mb-2">

                  <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Ajouter un Rendez-Vous</h3>
                </div>
              <?php include "forms/form_rendez-vous.php" ?>

              <br>
              <button type="submit" class="form-control btn btn-info   ">Ajouter le rendez-vous</button>
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
  <br>
  <br>
  <br>
  <br>
  <br>
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
