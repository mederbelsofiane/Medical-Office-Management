<?php include "../php/database.php" ?>
<?php include "../php/diagnostique.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
<?php

if (isset($_GET['id_dossier'])) {
  $id_link=$_GET['id_dossier'];
}

if(is_post_request()){

    // Create record using post parameters
    $args = $_POST['diagnostique'];

    $diagnostique = new Diagnostique($args);
    print_r($diagnostique);

    $result = $diagnostique->ajouter();


      if ($result) {
      $new_id = $diagnostique->id_diagnostique;

        $_SESSION['message'] = 'le diagnostique a était crée.';
        redirect_to('diagnostiques.php?id_diagnostique=' . $new_id);
      }else {
        echo "failed";
      }

  } else {
    // display the form
    $diagnostique = [];
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ajouter</title>
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
              <a href="<?php echo ('patients.php'); ?>">&laquo; Back to patients</a><br>
            </div>
            <form action="ajouterDiagnostique.php" method="post"
            style="  border:2px solid #5D6D7E ;
               box-shadow: 0px 4px 6px 6px #5D6D7E ;
              border-radius: 5px;
              align-self: center;" class="border border-secondary rounded   p-3">
              <div class="text-info mb-2">

              <i class="fas fa-stethoscope fa-2x d-inline"></i><h3 class="d-inline m-2">Ajouter Diagnostique</h3>
            </div>
                  <div class="font-weight-bold">
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <?php
                        $result = Diagnostique::find_all_dossier_patient_nom();
                        ?>
                        <?php   while($row = $result->fetch_assoc())
                        { if ($id_link==$row['id_dossier']) {
                          // code...
                         $dossier = $row['id_patient']."- ".$row['nom_patient']." ".$row['prenom_patient'] ."<br> Nom du dossier : ".$row['nom_dossier'].  "<br>Creation du dossier : ".$row['date_de_creation_dossier'] ;
                          $id_dossier=$row['id_dossier'];


                       } }?>
                       <h4 class="text-dark">Le patient Diagnostiqué :</h4><h4 class="alert alert-info"> <?php echo $dossier; ?></h4>
                        <input type="hidden"  name="diagnostique[id_dossier]" value="<?php echo $id_link; ?>">
                    </div>
                    </div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Date de creation du diagnostique :</label>
                    <input type="date" name="diagnostique[date_de_creation]" min="1950-01-01" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" class="form-control">
                  </div>
                  </div>


                  <div class="form-row mt-1">
                    <div class="form-group col-md-8">
                      <label for="">Le medecin diagnostiquant :</label>
                  <?php
                  $result = Diagnostique::all_medecin();
                  ?>
                  <select class="custom-select" name="diagnostique[id_medecin]">

                    <?php   while($row = $result->fetch_assoc())
                    { $medecin = $row['id_medecin']."- ".$row['nom_medecin']." ".$row['prenom_medecin']." : ".$row['specialite'];
                      $id_medecin=$row['id_medecin'];

                  echo "<option value='$id_medecin'>$medecin</option>";?>

                  <?php } ?>
                  </select>
                  </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="">Diagnostique :</label>
                    <textarea class="form-control" name="diagnostique[diagnostique]" rows="3"></textarea>
                  </div>
                  </div>
                  </div>


              <br>
              <button type="submit" class=" form-control btn btn-info btn-lg   ">Ajouter le Diagnostique</button>
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
