<?php include "../php/includes_patient.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../ressources/css/style_admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../fontawesome/js/all.js"></script>
    <title>Admin</title>
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
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <a href="medecins.php">

                    <div class="d-flex justify-content-between">
                      <i class="fas fa-user-md fa-3x text-primary"></i>
                      <div class="text-right text-secondary">
                        <h5>Docteurs</h5>
                           <?php $count_medecin=Patient::count_all_medecin();
                                    // while($row = $result->fetch_assoc()){
                                    //   $count_medecin=$row['total'];
                                    // }
                            ?>
                            <h3><?php
                             echo $count_medecin;
                             ?></h3>
                      </div>
                    </div>
                  </div>
                </a>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-decoration-none">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Rafraichir</span>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <a href="urgence.php">

                    <div class="d-flex justify-content-between">
                      <i class="fas fa-ambulance fa-3x text-danger "></i>
                      <div class="text-right text-secondary">
                        <h5>Urgence</h5>
                        <?php   $count_urgence=Patient::count_all_urgence();
                                // while($row = $result->fetch_assoc()){
                                //   $count_urgence=$row['total'];
                                // }
                        ?>
                        <h3><?php echo $count_urgence; ?></h3>
                      </div>
                    </div>
                  </div>
                </a>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-decoration-none">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Rafraichir</span>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <a href="patients.php">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h5>Patients</h5>
                        <?php $count_patient=Patient::count_all_patients();
                                // while($row = $result->fetch_assoc()){
                                //   $count_patient=$row['total'];
                                // }
                        ?>
                        <h3><?php echo $count_patient; ?></h3>
                      </div>
                    </div>
                  </div>
                </a>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-decoration-none">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Rafraichir</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <a href="rendez-vous.php">
                    <div class="d-flex justify-content-between">
                      <i class="fas far fa-calendar-check fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                        <h5>Rendez-Vous</h5>
                        <?php $count_rendez_vous=Patient::count_all_rendez_vous();
                                 // while($row = $result->fetch_assoc()){
                                 //   $count_rendez_vous=$row['total'];
                                 // }
                         ?>
                         <h3><?php echo $count_rendez_vous; ?></h3>
                      </div>
                    </div>
                  </div>
                </a>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-decoration-none">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Rafraichir</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="text-danger font-weight-bold"><h3><i class="far fa-calendar-check text-danger"></i> Urgences</h3></div>
                  <table class="table table-striped table-bordered text-center text-danger">
                    <thead>
                      <tr>
                        <th scope="col">#Id </th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Age</th>
                        <th scope="col">Address</th>
                        <th scope="col">type de l'urgence</th>
                        <th scope="col">Description de l'urgence</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM urgence LIMIT 5";
                      $result = Patient::query($sql);
                      ?>
                      <?php   while($row = $result->fetch_assoc())
                      {  ?>
                      <tr>
                        <th scope="row"><?php echo h($row['id_urgence']); ?></th>
                        <td><?php echo h($row['nom']); ?></td>
                        <td><?php echo h($row['prenom']); ?></td>
                        <td><?php echo h($row['sexe']); ?></td>
                        <td><?php //echo h($row['date_de_naissance']);
                        $dateOfBirth = $row['date_de_naissance'];
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        echo h($diff->format('%y'));
                         ?></td>
                        <td><?php echo h($row['adress_urgence']); ?></td>
                        <td><?php echo h($row['type_urgence']); ?></td>
                        <td><?php echo h($row['description_urgence']); ?></td>
                        </tr>
                      <?php }?>
                    </tbody>
                 </table>
              </div>


              <div class="col-lg-12">
                <div class="text-info font-weight-bold"><h3><i class="fas fa-users text-info"></i> Les Patients</h3></div>
                <div class="" style="height:300px; overflow : auto;">
                <table class="table table-striped table-bordered text-center table-responsive-md">
                  <thead>
                    <tr>
                      <th scope="col">#Id</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
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
                    { $cpt=$cpt + 1; if ($cpt<5) {
                      // code...
                     ?>
                    <tr>
                      <th scope="row"><?php echo ($patient->id_patient); ?></th>
                      <td><?php echo ($patient->nom_patient); ?></td>
                      <td><?php echo ($patient->prenom_patient); ?></td>
                      <td><?php echo ($patient->telephone); ?></td>
                      <td><?php echo ($patient->email); ?></td>
                      <td class="text-center  text-light"><a href="dossierPatient.php?id_patient=<?php echo ($patient->id_patient);?>"  name="button" class="btn btn-info" >Voir Dossier</a>
                      <td class="text-center  text-light"><a  href="patientDetail.php?id_patient=<?php echo ($patient->id_patient);?>" name="button" class="btn btn-success" >Détail</a>

                    </tr>
                    <?php }}?>
                  </tbody>
               </table>
             </div>
           </div>
              <div class="col-lg-12">
                <div class="text-success font-weight-bold"><h3><i class="far fa-calendar-check text-success"></i> Rendez-vous</h3></div>
                  <div class="" style="height:300px; overflow : auto;">

                  <table class="table table-striped table-bordered text-center table-responsive-md">
                    <thead>
                      <tr>
                        <th scope="col">#Id RV</th>
                        <th scope="col">Nom du patient</th>
                        <th scope="col">Prenom du patient</th>
                        <th scope="col">Age</th>
                        <th scope="col">Date du rendez vous</th>
                        <th scope="col">heure debut</th>
                        <th scope="col">heure fin</th>
                        <th scope="col" class="text-center">Detail du patient</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = Patient::find_all_patient();
                      ?>
                      <?php   while($row = $result->fetch_assoc())
                      {  ?>
                      <tr>
                        <th scope="row"><?php echo h($row['id_rendez_vous']); ?></th>
                        <td><?php echo h($row['nom_patient']); ?></td>
                        <td><?php echo h($row['prenom_patient']); ?></td>
                        <td><?php //echo h($row['date_de_naissance']);
                        $dateOfBirth = $row['date_de_naissance'];
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        echo h($diff->format('%y'));
                         ?></td>
                        <td><?php echo h($row['date_rendez_vous']); ?></td>
                        <td><?php echo h($row['heure_d']); ?></td>
                        <td><?php echo h($row['heure_fin']); ?></td>
                        <td class="text-center  text-light"><a href="patientDetail.php?id_patient=<?php echo ($row['id_patient']);?>" name="button" class="btn btn-success" >Détail</a>
                        </tr>
                      <?php }?>
                    </tbody>
                 </table>
               </div>

              </div>
              <div class="col-lg-4">


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
