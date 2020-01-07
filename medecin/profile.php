<?php include "../php/database.php" ?>
<?php include "../php/medecin.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_medecin.php') ?>
<?php require_login_medecin();  ?>


<?php    $id_medecin = $session_medecin->get_id();

  $medecin = Medecin::find_by_id($id_medecin);
?>
    <?php $title = $medecin->name(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?> </title>
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
              <div class="col-md-12">


<div class="row">



          <div class="col-md-5">
            <div class="font-weight-bold ml-3">
            <h3 class="text-info">Detail Du medecin : </h3>
            <h3><?php echo  h($medecin->nom_medecin). "  " . ($medecin->prenom_medecin);  ?></h3>
          </div>
            <table class="table table-striped table-bordered">
              <tr>
                <th>#id</th>
                <td><?php echo h($medecin->id_medecin); ?></td>
              </tr>
              <tr>
                <th>Nom Du medecin</th>
                <td><?php echo h($medecin->nom_medecin); ?></td>
              </tr>
              <tr>
                <th>Prenom Du medecin</th>
                <td><?php echo h($medecin->prenom_medecin); ?></td>
              </tr>
              <tr>
                <th>Age</th>
                <td><?php //echo h($row['date_de_naissance']);
                $dateOfBirth = $medecin->date_de_naissance;
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                echo h($diff->format('%y'));
                 ?></td>
              </tr>
              <tr>
                <th>Specialite</th>
                <td><?php echo h($medecin->specialite); ?></td>
              </tr>
              <tr>
                <th>Sexe</th>
                <td><?php echo h($medecin->sexe); ?></td>
              </tr>
              <tr>
                <th>Date de naissance</th>
                <td><?php echo h($medecin->date_de_naissance); ?></td>
              </tr>
              <tr>
                <th>Numero de Telephone</th>
                <td><?php echo h($medecin->telephone); ?></td>
              </tr>
              <tr>
                <th>Email du medecin</th>
                <td><?php echo h($medecin->email); ?></td>
              </tr>

            </table>
            <div class="px-3">
              <a class="btn btn-warning px-4 mt-2 mr-2" href="modifierMedecin.php?id_medecin=<?php echo ($medecin->id_medecin);?>
                " name="button" class="btn btn-warning" >Modifier</a>
              </div>
          </div>
          <div class="col-md-1">


          </div>
          <div class="col-md-4">

            <div class="font-weight-bold ml-3">
              <h3 class="text-info"> La Carte Sur l'acceuil : </h3><h3> Preview </h3>
            </div>
            <div class="bg-dark p-5  rounded" >

            <div class="card" >
              <img src="<?php echo h($medecin->image);  ?>" class="card-img-top">
              <div class="card-body">
                <div class="card-title">
                  <h3 class="text-muted"><?php echo h($medecin->prenom_medecin)." ".h($medecin->nom_medecin);  ?></h3>
                </div>
                <div class="card-subtitle">
                  <p class="lead text-secondary"><?php echo h($medecin->specialite);  ?></p>
                </div>
                <div class="text-right">
                  <a href="#"><i class="fab fa-facebook fa-2x mx-2 text-primary"></i></a>
                  <a href="#"><i class="fab fa-twitter fa-2x mx-2 text-info"></i></a>
                  <a href="#"><i class="fab fa-youtube fa-2x mx-2 text-danger"></i></a>
                  <a href="#"><i class="fab fa-linkedin fa-2x mx-2 text-info"></i></a>
                </div>
              </div>
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
