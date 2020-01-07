<?php include "../php/database.php" ?>
<?php include "../php/dossier.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_medecin.php') ?>
<?php require_login_medecin();  ?>
<?php $id_patient = $_GET['id_patient'];  ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>dossier-Patient</title>
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
        <div class="col">

          <table class="table table-striped table-bordered text-center table-responsive-md">
            <thead>
              <tr>
                <th scope="col">#Id du patient</th>
                <th scope="col">Nom du patient</th>
                <th scope="col">Prenom du patient</th>
                <th scope="col">#Id Dossier</th>
                <th scope="col">Nom du Dossier</th>
                <th scope="col">Date de creation du Dossier</th>
                <th scope="col">Age</th>
                <th scope="col" class="text-center">Les diagnostiques</th>
                <th scope="col">Ajouter un diagnostique</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = Dossier::find_all_dossier_patient_date();
              ?>
              <?php   while($row = $result->fetch_assoc())
              {   if ($id_patient == $row['id_patient']) {
                // code...

                 ?>
              <tr>
                <th scope="row"><?php echo h($row['id_patient']); ?></th>
                <td><?php echo h($row['nom_patient']); ?></td>
                <td><?php echo h($row['prenom_patient']); ?></td>
                <td><?php echo h($row['id_dossier']); ?></td>
                <td><?php echo h($row['nom_dossier']); ?></td>
                <td><?php echo h($row['date_de_creation_dossier']); ?></td>
                <td>
                <?php
                $dateOfBirth = $row['date_de_naissance'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                echo h($diff->format('%y'));
                 ?>
               </td>

                <td class="text-center  text-light"><a href="diagnostiques.php?id_dossier=<?php echo ($row['id_dossier']);?>"
                   name="button" class="btn btn-success" >Diagnostiques</a></td>
                   <td class="text-center  text-light"><a href="ajouterDiagnostiqueid.php?id_dossier=<?php echo ($row['id_dossier']);?>"
                     name="button" class="btn btn-info" > Ajouter un Diagnostique</a></td>
              </tr>
              <?php }}?>
            </tbody>
         </table>

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
