<?php include "../php/database.php" ?>
<?php include "../php/dossier.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>

<?php
  if(!isset($_GET['id_dossier'])){
    redirect_to('profile.php');
  }
  $id_dossier = $_GET['id_dossier'];
  $dossier = Dossier::find_by_id($id_dossier);
  if($dossier == false) {
    redirect_to('index.php');
  }
  if(is_post_request()) {


    $result = $dossier->delete();

    $_SESSION['message'] = 'le dossier a était Suprimer.';
    redirect_to('dossiers.php');

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
                  <a href="<?php echo ('dossiers.php'); ?>">&laquo; Back to Dossiers</a><br>
                  <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">suprimer un Dossier</h3>
                </div>
                <div class="">
                  <div class="alert alert-danger position-static">
                  <h5>Voulez vous Suprimer ce Dossier ?</h5>
                  <p class="pt-1"> <?php echo h($dossier->name()); ?></p>
                  </div>
                <form action="<?php echo ('suprimerDossier.php?id_dossier=' . h(u($id_dossier))); ?>" method="post" class=" ">
                  <button type="submit" class="btn btn-danger">Suprimer le Dossier</button>
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
