<?php include "../php/database.php" ?>
<?php include "../php/patient.class.php" ?>
<?php include "../php/pagination.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_medecin.php') ?>
<?php require_login_medecin();  ?>
<?php   $current_page = $_GET['page'] ?? 1;
  $per_page = 3;
  $total_count = Patient::count_all_patients();

  $pagination = new Pagination($current_page, $per_page, $total_count);
  $sql = "SELECT * FROM patient ORDER BY nom_patient ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";

  $patients = Patient::find_by_sql($sql);

   ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patients</title>
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
                <div class="text-info text-center font-weight-bold"><h2><i class="fas fa-users text-info"></i> Les Patients</h2></div>
                <br>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search text-info"></i></span>
                    <input type="text" name="search_text" id="search_text" placeholder="Rechercher selon les details du patient" class="form-control" />
                  </div>
                </div>
                <br />
                <div id="result"></div>

                <table class="table table-striped table-bordered text-center table-responsive-md">
                  <thead>
                    <tr>
                      <th scope="col">#Id</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Age</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Email</th>
                      <th scope="col" class="text-center">Dossier</th>
                      <th scope="col" class="text-center">Détail</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  //  $patients = Patient::find_all();
                    ?>
                    <?php foreach ($patients as $patient)
                    {  ?>
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
                    <?php }?>
                  </tbody>
               </table>

               <div class="col-md-12">
                 <a  class="btn btn-info btn-lg mr-1" href="ajouterDossier.php">Ajouter un Dossier</a>
                 <a  class="btn btn-danger btn-lg mr-1" href="ajouterDiagnostique.php">Ajouter un diagnostique</a>
                 <nav aria-label="test">
                 <ul class="pagination justify-content-center">

                   <?php
                   $url = 'patients.php';
                   echo $pagination->page_links($url);
                   ?>
                 </ul>
               </nav>
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
       <script>
       $(document).ready(function(){
         load_data();
         function load_data(query)
         {
           $.ajax({
             url:"fetch_patient.php",
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
