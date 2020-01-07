<?php include "../php/database.php" ?>
<?php include "../php/secretaire.class.php" ?>
<?php include "../php/pagination.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
<?php
  $current_page = $_GET['page'] ?? 1;
  $per_page = 5;
  $total_count = Secretaire::count_all_secretaires();

  $pagination = new Pagination($current_page, $per_page, $total_count);
  $sql = "SELECT * FROM secretaire ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";

  $secretaires = secretaire::find_by_sql($sql);

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
  <body>
    <?php
    include'../html/admin/navbar.php'
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
                      <th scope="col">#Id</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Username</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Email</th>
                      <th scope="col" class="text-center">Détail</th>
                      <th scope="col" class="text-center">Modifier</th>
                      <th scope="col" class="text-center">Suprimer</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $secretaires = Secretaire::find_all();
                    ?>
                    <?php foreach ($secretaires as $secretaire)
                    {  ?>
                    <tr>
                      <th scope="row"><?php echo h($secretaire->id_secretaire); ?></th>
                      <td><?php echo h($secretaire->nom_secretaire); ?></td>
                      <td><?php echo h($secretaire->prenom_secretaire); ?></td>
                      <td><?php echo h($secretaire->username); ?></td>
                      <td><?php echo h($secretaire->telephone); ?></td>
                      <td><?php echo h($secretaire->email); ?></td>
                      <td class="text-center  text-light"><a href="secretaireDetail.php?id_secretaire=<?php echo ($secretaire->id_secretaire);?>" name="button" class="btn btn-success" >Détail</a>
                      <td class="text-center  text-light"><a href="modifierSecretaire.php?id_secretaire=<?php echo ($secretaire->id_secretaire);?>" name="button" class="btn btn-warning" >Modifier</a>
                      <td class="text-center  text-light"><a href="suprimerSecretaire.php?id_secretaire=<?php echo ($secretaire->id_secretaire);?>" name="button" class="btn btn-danger" >Suprimer</a>
                    </tr>
                    <?php }?>
                  </tbody>
               </table>
              </div>
              <div class="col-md-12">
              <a  class="btn btn-info btn-lg form-control mb-3" href="ajouterSecretaire.php">Ajouter une Secretaire</a>
              <nav aria-label="test">

              <ul class="pagination justify-content-center">

                <?php
                $url = 'secretaires.php';
                echo $pagination->page_links($url);
                ?>
              </ul>
              </nav>
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
