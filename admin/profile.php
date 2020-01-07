<?php include "../php/database.php" ?>
<?php include "../php/secretaire.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
  <?php $id_secretaire = $session_secretaire->get_id();
  $secretaire = Secretaire::find_by_id($id_secretaire); ?>

    <?php $title = $secretaire->full_name(); ?>

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
                <a href="<?php echo ('secretaires.php'); ?>">&laquo; Back to secretaires</a><br>

            <div class="font-weight-bold ml-2">
              <h3 class="text-info"><i class="fa fa-user fa-lg pb-1"></i> Detail De la secretaire : </h3>

            </div>
          </div>



          <div class="col-md-5">
            <table class="table table-striped table-bordered ml-2">
              <tr>
                <th>#id</th>
                <td><?php echo h($secretaire->id_secretaire); ?></td>
              </tr>
              <tr>
                <th>Nom</th>
                <td><?php echo h($secretaire->nom_secretaire); ?></td>
              </tr>
              <tr>
                <th>Prenom</th>
                <td><?php echo h($secretaire->prenom_secretaire); ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?php echo h($secretaire->username); ?></td>
              </tr>
              <tr>
                <th>Sexe</th>
                <td><?php echo h($secretaire->sexe); ?></td>
              </tr>
              <tr>
                <th>Age</th>
                <td><?php //echo h($row['date_de_naissance']);
                $dateOfBirth = $secretaire->date_de_naissance;
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                echo h($diff->format('%y'));
                 ?></td>
              </tr>
              <tr>
                <th>Date de naissance</th>
                <td><?php echo h($secretaire->date_de_naissance); ?></td>
              </tr>
              <tr>
                <th>Numero de Telephone</th>
                <td><?php echo h($secretaire->telephone); ?></td>
              </tr>
              <tr>
                <th>Email </th>
                <td><?php echo h($secretaire->email); ?></td>
              </tr>
            </table>
            <div class=" mr-2 text-center">

              <a class="btn btn-warning btn-lg px-4 mt-2 mr-2" href="modifierSecretaire.php?id_secretaire=<?php echo ($secretaire->id_secretaire);?>
                " name="button" class="btn btn-warning" >Modifier</a>
              <a class="btn btn-danger btn-lg px-4 mt-2 ml-2" href="suprimerSecretaire.php?id_secretaire=<?php echo ($secretaire->id_secretaire);?>
                " name="button" class="btn btn-danger" >Suprimer</a>
            </div>
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
