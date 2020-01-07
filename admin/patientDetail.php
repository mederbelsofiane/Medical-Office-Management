<?php include "../php/includes_patient.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>

<?php    $id_patient = $_GET['id_patient'] ?? false;

  $patient = Patient::find_by_id($id_patient);
?>
    <?php $title = $patient->name(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?> </title>
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
      <section>

      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col-md-12">
                <a href="<?php echo ('patients.php'); ?>">&laquo; Back to patients</a><br>

            <div class="font-weight-bold ml-2">
              <h3 class="text-info"><i class="fa fa-user fa-lg pb-1"></i> Detail Du patient : </h3>
              <div class="mb-2 mt-2">
              <a class="btn btn-info btn-lg ml-1 " style="width :40%;"
                 href="dossierPatient.php?id_patient=<?php echo ($patient->id_patient);?>
                " name="button" >Voir le Dossier du Patient</a>
              </div>
            </div>
          </div>



          <div class="col-md-5">
            <table class="table table-striped table-bordered ml-2 ">
              <tr>
                <th>#id</th>
                <td><?php echo h($patient->id_patient); ?></td>
              </tr>
              <tr>
                <th>Nom Du patient</th>
                <td><?php echo h($patient->nom_patient); ?></td>
              </tr>
              <tr>
                <th>Prenom Du patient</th>
                <td><?php echo h($patient->prenom_patient); ?></td>
              </tr>
              <tr>
                <th>Sexe</th>
                <td><?php echo h($patient->sexe); ?></td>
              </tr>
              <tr>
                <th>Age</th>
                <td><?php //echo h($row['date_de_naissance']);
                $dateOfBirth = $patient->date_de_naissance;
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                echo h($diff->format('%y'));
                 ?></td>
              </tr>
              <tr>
                <th>Date de naissance</th>
                <td><?php echo h($patient->date_de_naissance); ?></td>
              </tr>
              <tr>
                <th>Numero de Telephone</th>
                <td><?php echo h($patient->telephone); ?></td>
              </tr>
              <tr>
                <th>Email du patient</th>
                <td><?php echo h($patient->email); ?></td>
              </tr>
              <tr>
                <th>Mot de pass</th>
                <td><?php echo h($patient->pass); ?></td>
              </tr>

            </table>
            <div class="px-3 m-auto text-center">

              <a class="btn btn-warning btn-lg px-4 mt-2 mr-2" href="modifierPatient.php?id_patient=<?php echo ($patient->id_patient);?>
                " name="button" class="btn btn-warning" >Modifier</a>
              <a class="btn btn-danger btn-lg px-4 mt-2 ml-2" href="suprimerPatient.php?id_patient=<?php echo ($patient->id_patient);?>
                " name="button" class="btn btn-danger" >Suprimer</a>
            </div>
          </div>
          <div class="col-md-5">
            <table class="table table-striped table-bordered text-center table-responsive-md">
              <thead>
                <tr>
                  <th scope="col">#Id RV</th>
                  <th scope="col">Date du rendez vous</th>
                  <th scope="col">heure debut</th>
                  <th scope="col">heure fin</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = Patient::find_all_patient();
                ?>
                <?php   while($row = $result->fetch_assoc())
                { if ($id_patient == $row['id_patient']) {
                  // code...
                  ?>
                  <tr>
                  <th scope="row"> <?php echo h($row['id_rendez_vous']) ?> </th>
                  <td><?php echo h($row['date_rendez_vous']); ?></td>
                  <td><?php echo h($row['heure_d']); ?></td>
                  <td><?php echo h($row['heure_fin']); ?></td>
                <?php } }?>
                  </tr>
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
