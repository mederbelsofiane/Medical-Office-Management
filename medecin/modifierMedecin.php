<?php include "../php/database.php" ?>
<?php include "../php/medecin.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_medecin.php') ?>
<?php require_login_medecin();  ?>
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
  include "../upload_med_img.php";
  $args = $_POST['medecin'];
  $medecin->image=$target_file;
  $medecin->merge_attributes($args);
  $result = $medecin->update();
  if ($result) {
    // code...

    $_SESSION['message'] = 'le  medecin a était modifier.';
    redirect_to('profile.php?id_medecin=' . $id_medecin);
  }

} else {
  // display the form
    $medecins = new Medecin;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>modifierMedecin</title>
    <link rel="stylesheet" href="../ressources/css/style_medecin.css">
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
include'../html/medecin/navbar.php'
  ?>
  <section>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row pt-md-5 mt-md-3 mb-5">
          <div class="col-md-8 ml-3">
                <?php echo display_errors($medecin->errors); ?>
            <form action="<?php echo ('modifierMedecin.php?id_medecin=' . h(u($id_medecin))); ?>" method="post"
               enctype="multipart/form-data" style="  border:2px solid #5D6D7E ;
                  box-shadow: 0px 4px 6px 6px #5D6D7E ;
                 border-radius: 5px;
                 align-self: center;" class="border border-secondary rounded   p-3">
                 <div class="text-warning mb-2">

                 <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Modifer un Medecin</h3>
               </div>
              <?php include "forms/form_medecin.php" ?>
              <button type="submit" class="form-control btn btn-warning">Modifer le medecin</button>
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
<br>
<br>

   <script src="../bootstrap/js/jquery.min.js" ></script>
   <script src="../bootstrap/js/popper.min.js"></script>
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
