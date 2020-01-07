<?php include "../php/database.php" ?>
<?php include "../php/diagnostique.class.php" ?>
<?php include "../php/pagination.class.php" ?>

<?php include "../php/function.php" ?>
<?php include "../php/validation_fonctions.php" ?>
<?php include "../php/errors_status.php" ?>
<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php require_login();  ?>
  <?php
      if ($_GET['id_dossier'] ?? false){
        $id_dossier = $_GET['id_dossier'];
        $id_diagnostique="";
        $current_page = $_GET['page'] ?? 1;
        $per_page = 2;

        $sql = "SELECT COUNT(*) as total FROM diagnostique WHERE ";
        $sql .=" diagnostique.id_dossier = {$id_dossier}" ;
        $result = Diagnostique::query($sql);
        if(!$result) {
          exit("Database query failed.");
        }
        $row = $result->fetch_array();


        $total_count= array_shift($row);


        // $total_count = Diagnostique::count_all_diagnostique();

        $pagination = new Pagination($current_page, $per_page, $total_count);

        $sql = "SELECT * FROM patient";
        $sql .=" INNER JOIN dossier ";
        $sql .="ON patient.id_patient = dossier.id_patient ";
        $sql .="INNER JOIN diagnostique ";
        $sql .="ON dossier.id_dossier = diagnostique.id_dossier ";
        $sql .="INNER JOIN medecin ";
        $sql .="ON diagnostique.id_medecin = medecin.id_medecin ";
        $sql .= "WHERE dossier.id_dossier = {$id_dossier} ";
        $sql .= "LIMIT {$per_page} ";
        $sql .= "OFFSET {$pagination->offset()}";
        $diagnostiques = Diagnostique::query($sql);
      }
      else {
        $id_diagnostique=$_GET['id_diagnostique'];
        $id_dossier="A";
        $current_page = $_GET['page'] ?? 1;
        $per_page = 2;

        $sql = "SELECT COUNT(*) as total FROM diagnostique WHERE ";
        $sql .=" diagnostique.id_diagnostique = {$id_diagnostique}" ;
        $result = Diagnostique::query($sql);
        if(!$result) {
          exit("Database query failed.");
        }
        $row = $result->fetch_array();


        $total_count= array_shift($row);


        // $total_count = Diagnostique::count_all_diagnostique();

        $pagination = new Pagination($current_page, $per_page, $total_count);

        $sql = "SELECT * FROM patient";
        $sql .=" INNER JOIN dossier ";
        $sql .="ON patient.id_patient = dossier.id_patient ";
        $sql .="INNER JOIN diagnostique ";
        $sql .="ON dossier.id_dossier = diagnostique.id_dossier ";
        $sql .="INNER JOIN medecin ";
        $sql .="ON diagnostique.id_medecin = medecin.id_medecin ";
        $sql .= "WHERE diagnostique.id_diagnostique = {$id_diagnostique} ";
        $sql .= "LIMIT {$per_page} ";
        $sql .= "OFFSET {$pagination->offset()}";
        $diagnostiques = Diagnostique::query($sql);
      }
  ?>
  <?php
    // $current_page = $_GET['page'] ?? 1;
    // $per_page = 2;
    //
    // $sql = "SELECT COUNT(*) as total FROM diagnostique WHERE ";
    // $sql .=" diagnostique.id_dossier = {$id_dossier}" ;
    // $result = Diagnostique::query($sql);
    // if(!$result) {
    //   exit("Database query failed.");
    // }
    // $row = $result->fetch_array();
    //
    //
    // $total_count= array_shift($row);
    //
    //
    // // $total_count = Diagnostique::count_all_diagnostique();
    //
    // $pagination = new Pagination($current_page, $per_page, $total_count);
    //
    // $sql = "SELECT * FROM patient";
    // $sql .=" INNER JOIN dossier ";
    // $sql .="ON patient.id_patient = dossier.id_patient ";
    // $sql .="INNER JOIN diagnostique ";
    // $sql .="ON dossier.id_dossier = diagnostique.id_dossier ";
    // $sql .="INNER JOIN medecin ";
    // $sql .="ON diagnostique.id_medecin = medecin.id_medecin ";
    // $sql .= "WHERE dossier.id_dossier = {$id_dossier} ";
    // $sql .= "LIMIT {$per_page} ";
    // $sql .= "OFFSET {$pagination->offset()}";
    // $diagnostiques = Diagnostique::query($sql);
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
                <?php
                // $result = Diagnostique::find_all_dossier_patient_diagnostique_medecin();
                $cpt = 0;
                ?>
                <?php   while(($row = $diagnostiques->fetch_assoc()) && ($cpt < $per_page))
                {
                   // if (($id_dossier == $row['id_dossier'])) {
                  $cpt += 1;

                  ?>
                  <div class="text-center font-weight-bold">
                    <h3>Info diagnostique,  Dossier (<?php echo $row['nom_dossier']; ?>)</h3>
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


                  <?php }
                // }
                ?>
                  <?php
                //  $result = Diagnostique::find_all_dossier_patient_diagnostique_medecin();
                  ?>
                  <?php   while($row = $diagnostiques->fetch_assoc())
                  {   if (  ($id_diagnostique==$row['id_diagnostique'])) {
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
                    <?php }}?>

                  <div class="col-md-12">
                    <nav aria-label="test">

                      <ul class="pagination justify-content-center">

                        <?php
                        if($pagination->total_pages() > 1){
                        $url = 'diagnostiques.php';
                        $linkp="";
                        if($pagination->previous_page() != false) {
                          $linkp .= "<a class=\"page-link \" href=\"{$url}?id_dossier={$id_dossier}&page={$pagination->previous_page()}\">";
                          $linkp .= "&laquo; Previous</a>";
                        }

                        $linkn="";
                        if($pagination->next_page() != false) {
                          $linkn .= "<a class=\"page-link \" href=\"{$url}?id_dossier={$id_dossier}&page={$pagination->next_page()}\">";
                          $linkn .= " Next &raquo </a>";
                        }

                        $output = "";
                        for($i=1; $i <= $pagination->total_pages(); $i++) {
                          if($i == $pagination->current_page) {
                            $output .= "<span class=\"page-link selected\">{$i}</span>";
                          } else {
                            $output .= "<li class=\"page-item\">";

                            $output .= "<a class=\"page-link \" href=\"{$url}?id_dossier={$id_dossier}&page={$i}\">{$i}</a>";
                            $output .= "</li>";

                          }
                        }
                        // echo $pagination->previous_link($url);
                        echo $linkp;
                        // echo $pagination->number_links($url);
                        echo $output;
                        // echo $pagination->next_link($url);
                        echo $linkn;
                      }?>

                     </ul>
                   </nav>

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
