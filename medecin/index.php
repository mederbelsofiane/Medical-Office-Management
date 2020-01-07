<?php include "../php/database.php" ?>
<?php include "../php/patient.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_medecin.php') ?>
<?php require_login_medecin(); ?>
<?php    $id_medecin = $session_medecin->get_id();

  if(!$id_medecin) {
    redirect_to('index.php');
  }?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medecin</title>
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
              <div class="col-md-12 text-center">


            <div class=" ml-3">
              <h3 class="text-info">Bienvenu dans votre Page de controle : </h3>
              <h2>
                <?php
                $result = Patient::all_medecin();
                ?>
                <?php   while($row = $result->fetch_assoc())
                {   if ($id_medecin == $row['id_medecin']) {
                echo $row['nom_medecin']." ".$row['prenom_medecin']." ( ".$row['specialite']." )";
              }}?>.</h2>
            <a  class="btn btn-info btn-lg mr-1" href="ajouterDossier.php">Ajouter un Dossier</a>

            <a  class="btn btn-danger btn-lg mr-1" href="ajouterDiagnostique.php">Ajouter un diagnostique</a>
            <br>
            <br>
            <table class="table table-striped table-bordered text-center table-responsive-md">
              <thead>
                <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Nom du patient</th>
                  <th scope="col">Prenom du patient</th>
                  <th scope="col">Age</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Email</th>
                  <th scope="col" class="text-center">Dossier</th>
                  <th scope="col" class="text-center">Détail</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $patients = Patient::find_all();
                $cpt=0;
                ?>
                <?php foreach ($patients as $patient)
                {  if ($cpt<5) { $cpt=$cpt+1;
                 ?>
                <tr>
                  <th scope="row"><?php echo h($patient->id_patient); ?></th>
                  <td><?php echo h($patient->nom_patient); ?></td>
                  <td><?php echo h($patient->prenom_patient); ?></td>
                  <td><?php //echo h($row['date_de_naissance']);
                  $dateOfBirth = $patient->date_de_naissance;
                  $today = date("Y-m-d");
                  $diff = date_diff(date_create($dateOfBirth), date_create($today));
                  echo h($diff->format('%y'));
                   ?></td>
                  <td><?php echo h($patient->telephone); ?></td>
                  <td><?php echo h($patient->email); ?></td>
                  <td class="text-center  text-light"><a href="dossierPatient.php?id_patient=<?php echo ($patient->id_patient) ; ?>"  name="button" class="btn btn-info" >Voir Dossier</a>
                  <td class="text-center  text-light"><a href="patientDetail.php?id_patient=<?php echo ($patient->id_patient);?>" name="button" class="btn btn-success" >Détail</a>
                </tr>
                <?php }}?>
              </tbody>
           </table>


            <div class="col-md-5">
            </div>
            <div class="col-md-2">


            </div>
            <div class="col-md-5">



            </div>
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
