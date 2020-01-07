<?php include "../php/includes_patient.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
<?php

if(!isset($_GET['id_patient'])){
  redirect_to('profile.php');
}
$id_patient = $_GET['id_patient'];
$patient = Patient::find_by_id($id_patient);
if($patient == false) {
  redirect_to('index.php');
}
if(is_post_request()) {

  $args = $_POST['patient'];

  $patient->merge_attributes($args);
  $result = $patient->update();
  if ($result) {
    // code...


    $_SESSION['message'] = 'le patient a était modifier.';
    redirect_to('patientDetail.php?id_patient=' . $id_patient);
  }
} else {
  $patients=new Patient;
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
                  <a href="<?php echo ('patients.php'); ?>">&laquo; Back to patients</a><br>
                    <?php echo display_errors($patient->errors); ?>
                </div>

                <form action="<?php echo ('modifierPatient.php?id_patient=' . h(u($id_patient))); ?>" method="post"
                  style="  border:2px solid #5D6D7E ;
                     box-shadow: 0px 4px 6px 6px #5D6D7E ;
                    border-radius: 5px;
                    align-self: center;" class="border border-secondary rounded   p-3">
                    <div class="text-warning mb-2">

                      <i class="far fa-plus-square fa-2x d-inline"></i><h3 class="d-inline m-2">Modifer un Patient</h3>
                    </div>
                  <?php include "forms/form_patient.php" ?>
                  <button type="submit" class="form-control btn btn-warning">Modifer le patient</button>

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
