<?php include "../php/database.php" ?>
<?php include "../php/dossier.class.php" ?>
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
  $total_count = Dossier::count_all_dossier();

  $pagination = new Pagination($current_page, $per_page, $total_count);
  $sql = "SELECT * FROM dossier";
  $sql .=" INNER JOIN patient ";
  $sql .="ON dossier.id_patient = patient.id_patient ORDER BY nom_patient ASC ,date_de_creation_dossier DESC ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $dossier = Dossier::query($sql);

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

                    <div class="text-success text-center font-weight-bold"><h2><i class="far fa-address-book text-success"></i> Les Dossiers.</h2></div>

                    <br>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search text-info "></i> </span>
                        <input type="text" name="search_text" id="search_text" placeholder="Rechercher les dossiers selon leurs Details" class="form-control" />
                      </div>
                    </div>
                    <br />
                    <div id="result"></div>
                <table class="table table-striped table-bordered text-center table-responsive-md">
                  <thead>
                    <tr>
                      <th scope="col">#Id Dossier</th>
                      <th scope="col">Nom du patient</th>
                      <th scope="col">Prenom du patient</th>
                      <th scope="col">Nom du Dossier</th>
                      <th scope="col">Date de creation du Dossier</th>
                      <th scope="col">Age</th>
                      <th scope="col">Ajouter Un Diagnostique</th>
                      <th scope="col" class="text-center">Les diagnostiques</th>
                      <th scope="col" class="text-center">Suprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // $result = Dossier::find_all_dossier_patient_date();
                    $cpt=0;
                    ?>
                    <?php   while(($row = $dossier->fetch_assoc()) && ($cpt < $per_page))
                    { $cpt += 1;  ?>
                    <tr>
                      <th scope="row"><?php echo h($row['id_dossier']); ?></th>
                      <td><?php echo h($row['nom_patient']); ?></td>
                      <td><?php echo h($row['prenom_patient']); ?></td>
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
                     <td class="text-center  text-light"><a href="ajouterDiagnostiqueid.php?id_dossier=<?php echo ($row['id_dossier']);?>"
                        name="button" class="btn btn-info" >Ajouter Un Diagnostique</a></td>
                     <td class="text-center  text-light"><a href="diagnostiques.php?id_dossier=<?php echo ($row['id_dossier']);?>"
                        name="button" class="btn btn-success" >Diagnostiques</a> </td>

                    <td class="text-center  text-light"><a href="suprimerDossier.php?id_dossier=<?php echo ($row['id_dossier']);?>"
                       name="button" class="btn btn-danger" >Suprimer</a></td>
                    </tr>
                    <?php }?>
                  </tbody>
               </table>

              </div>
              <div class="col-md-12">

                <a  class="btn btn-info btn-lg mr-1" href="ajouterDossier.php">Ajouter un Dossier</a>
                <a href="ajouterDiagnostique.php" class="btn btn-success btn-lg mr-3 mb-3 mt-3 ml-0">Ajouté Un Diagnostique</a>

                <nav aria-label="test">

                <ul class="pagination justify-content-center">

                <?php
                $url = 'dossiers.php';
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
       <script>
       $(document).ready(function(){
         load_data();
         function load_data(query)
         {
           $.ajax({
             url:"fetch_dossier.php",
             method:"post",
             data:{query:query},
             success:function(data)
             {
               $('#result').html(data);
             }
           });
         }

         $('#search_text').keyup(function(){
           var search = $(this).val();
           if(search != '')
           {
             load_data(search);
           }
           else
           {
             load_data();
           }
         });
       });
       </script>
  </body>
</html>
