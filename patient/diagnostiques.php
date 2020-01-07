<?php include "../php/database.php" ?>
<?php include "../php/diagnostique.class.php" ?>
<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init_patient.php') ?>
<?php require_login_patient(); ?>
<?php
    if ($_GET['id_dossier'] ?? false){
      $id_dossier = $_GET['id_dossier'];
      $id_diagnostique="";
    }
    else {
      $id_diagnostique=$_GET['id_diagnostique'];
      $id_dossier="A";
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mes Diagnostiques</title>
    <link rel="stylesheet" href="../ressources/css/style_patient.css">
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
    include'../html/patient/navbar.php'
      ?>
      <section>

      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
              <div class="col">
                <?php
                $result = Diagnostique::find_all_dossier_patient_diagnostique_medecin();
                ?>
                <?php   while($row = $result->fetch_assoc())
                {   if (($id_dossier == $row['id_dossier'])) {

                  ?>
                  <div class="text-center font-weight-bold">
                    <h3>Info diagnostique, Dossier (<?php echo $row['nom_dossier']; ?>)</h3>
                  </div>
                <table class="table table-striped table-bordered text-center table-responsive-md">
                  <thead>
                    <tr>
                      <th scope="col">#Id diagnostique</th>
                      <th scope="col">Date de creation du diagnostique</th>
                      <th scope="col">#Id patient</th>
                      <th scope="col">Nom du patient</th>
                      <th scope="col">Prenom du patient</th>
                      <th scope="col">Age</th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <th scope="row"><?php echo h($row['id_diagnostique']); ?></th>
                      <td><?php echo h($row['date_de_creation']); ?></td>
                      <td><?php echo h($row['id_patient']); ?></td>
                      <td><?php echo h($row['nom_patient']); ?></td>
                      <td><?php echo h($row['prenom_patient']); ?></td>
                      <td>
                        <?php
                        $dateOfBirth = $row['date_de_naissance'];
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        echo h($diff->format('%y'));
                        ?>
                      </td>
                    </tr>


                  </tbody>
               </table>
               <div class="text-center font-weight-bold">
                 <h3>Diagnostique</h3>

               </div>
               <table class="table table-striped table-bordered text-center table-responsive-md">
                 <thead>
                   <tr>
                     <th scope="col" class="text-center">#Id medecin</th>
                     <th scope="col" class="text-center">Specialite du medecin</th>
                     <th scope="col" class="text-center">Nom du medecin</th>
                     <th scope="col" class="text-center">Prenom du medecin</th>

                   </tr>
                 </thead>
                 <tbody>

               <tr>
                 <td><?php echo h($row['id_medecin']); ?></td>
                 <td><?php echo h($row['specialite']); ?></td>
                 <td><?php echo h($row['nom_medecin']); ?></td>
                 <td><?php echo h($row['prenom_medecin']); ?></td>
               </tr>


             </tbody>
           </table>
           <table class="table table-striped table-bordered text-center table-responsive-md">
             <thead>
           <tr>
             <th scope="col" class="text-center">Diagnostique</th>
           </tr>
         </thead>
         <tbody>
             <tr>

           <td class="text-danger"><?php echo h($row['diagnostique']); ?></td>
          </tr>
        </tbody>
      </table>
           <hr>
           <hr>
           <hr>
           <br>
                  <?php }}?>
                  <?php
                  $result = Diagnostique::find_all_dossier_patient_diagnostique_medecin();
                  ?>
                  <?php   while($row = $result->fetch_assoc())
                  {   if (  ($id_diagnostique==$row['id_diagnostique'])) {

                    ?>
                    <br>
                    <div class="text-center font-weight-bold">
                      <h3>Info diagnostique, Dossier (<?php echo $row['nom_dossier']; ?>)</h3>

                    </div>

                  <table class="table table-striped table-bordered text-center table-responsive-md">
                    <thead>
                      <tr>
                        <th scope="col">#Id diagnostique</th>
                        <th scope="col">Date de creation du diagnostique</th>
                        <th scope="col">#Id patient</th>
                        <th scope="col">Nom du patient</th>
                        <th scope="col">Prenom du patient</th>
                        <th scope="col">Age</th>

                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th scope="row"><?php echo h($row['id_diagnostique']); ?></th>
                        <td><?php echo h($row['date_de_creation']); ?></td>
                        <td><?php echo h($row['id_patient']); ?></td>
                        <td><?php echo h($row['nom_patient']); ?></td>
                        <td><?php echo h($row['prenom_patient']); ?></td>
                        <td>
                          <?php
                          $dateOfBirth = $row['date_de_naissance'];
                          $today = date("Y-m-d");
                          $diff = date_diff(date_create($dateOfBirth), date_create($today));
                          echo h($diff->format('%y'));
                          ?>
                        </td>
                      </tr>
                      <br>


                    </tbody>
                 </table>
                 <br>
                 <div class="text-center font-weight-bold">
                   <h3>Diagnostique</h3>

                 </div>
                 <br>
                 <table class="table table-striped table-bordered text-center table-responsive-md">
                   <thead>
                     <tr>
                       <th scope="col" class="text-center">#Id medecin</th>
                       <th scope="col" class="text-center">Nom du medecin</th>
                       <th scope="col" class="text-center">Prenom du medecin</th>
                       <th scope="col" class="text-center">Diagnostique</th>

                     </tr>
                   </thead>
                   <tbody>

                 <tr>
                   <td><?php echo h($row['id_medecin']); ?></td>
                   <td><?php echo h($row['nom_medecin']); ?></td>
                   <td><?php echo h($row['prenom_medecin']); ?></td>
                   <td class="text-danger"><?php echo h($row['diagnostique']); ?></td>
                 </tr>
               </tbody>
             </table>
                    <?php }}?>
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
