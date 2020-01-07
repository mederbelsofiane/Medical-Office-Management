<?php include "../php/database.php" ?>
<?php include "../php/medecin.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>

<?php
  if(!isset($_GET['id_medecin'])){
    redirect_to('profile.php');
  }
  $id_medecin = $_GET['id_medecin'];
  $medecin = Medecin::find_by_id($id_medecin);
  if($medecin == false) {
    redirect_to('index.php');
  }
  if(is_post_request()) {


    $result = $medecin->delete();

    $_SESSION['message'] = 'le medecin a était Suprimer.';
    redirect_to('medecins.php');

  } else {
    // display the form
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
              <div class="col-md-5 ml-3">
                <div class=" text-danger mb-3">
                  <a href="<?php echo ('medecins.php'); ?>">&laquo; Back to medecins</a><br>
                  <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">suprimer un Medecin</h3>
                </div>
                <div class="">
                  <div class="alert alert-danger position-static">
                  <h5>Voulez vous Suprimer ce medecin ?</h5>
                  <p class="pt-1"> <?php echo h($medecin->name()); ?></p>
                  </div>
                <form action="<?php echo ('suprimerMedecin.php?id_medecin=' . h(u($id_medecin))); ?>" method="post" class=" ">
                  <button type="submit" class="btn btn-danger">Suprimer le medecin</button>
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
    </section>
       <script src="../bootstrap/js/jquery.min.js" ></script>
       <script src="../bootstrap/js/popper.min.js"></script>
       <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
