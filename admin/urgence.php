<?php include "../php/database.php" ?>
<?php include "../php/urgence.class.php" ?>
<?php include "../php/pagination.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
<?php   $current_page = $_GET['page'] ?? 1;
  $per_page = 5;
  $total_count = Urgence::count_all_urgence();

  $pagination = new Pagination($current_page, $per_page, $total_count);
  $sql = "SELECT * FROM urgence ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";

  $urgences = Urgence::find_by_sql($sql); ?>


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
                      <th scope="col">sexe</th>
                      <th scope="col">Age</th>
                      <th scope="col">Address</th>
                      <th scope="col">Type de l'urgence</th>
                      <th scope="col">Description</th>
                      <th scope="col" class="text-center">Suprimer</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $urgences = Urgence::find_all();
                    ?>
                    <?php foreach ($urgences as $urgence)
                    {  ?>
                    <tr>
                      <th scope="row"><?php echo h($urgence->id_urgence); ?></th>
                      <td><?php echo h($urgence->nom); ?></td>
                      <td><?php echo h($urgence->prenom); ?></td>
                      <td><?php echo h($urgence->sexe); ?></td>
                      <td><?php //echo h($row['date_de_naissance']);
                      $dateOfBirth = $urgence->date_de_naissance;
                      $today = date("Y-m-d");
                      $diff = date_diff(date_create($dateOfBirth), date_create($today));
                      echo h($diff->format('%y'));
                       ?></td>
                       <td><?php echo h($urgence->adress_urgence); ?></td>
                       <td><?php echo h($urgence->type_urgence); ?></td>
                       <td><?php echo h($urgence->description_urgence); ?></td>
                      <td class="text-center  text-light"><a href="suprimerUrgence.php?id_urgence=<?php echo ($urgence->id_urgence);?>" name="button" class="btn btn-danger" >Suprimer</a>
                    </tr>
                    <?php }?>
                  </tbody>
               </table>

              </div>
              <div class="col-md-12">
                <nav aria-label="test">

                <ul class="pagination justify-content-center">

                <?php
                $url = 'urgence.php';
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
