<nav class="navbar navbar-expand-md navbar-light">
  <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top  top-navbar ">
          <br>
                <div class="text-center">
                  <i class="fa fa-user fa-4x text-light"></i>

                </div>
          <a href="index.php" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border font-weight-bold"><h3 class="font-weight-bold">
            <?php if ($session_patient->is_logged_in()) {
              echo $session_patient->nom_patient;


             ?></h3>
           <h3 class="font-weight-bold"><?php echo  $session_patient->prenom_patient; }?></h3>
         </a>
          <ul class="navbar-nav flex-column mt-4">
            <li class="nav-item"><a href="index.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="fas fa-home text-light fa-lg mr-3"></i>Accueil</a></li>

            <li class="nav-item"><a href="profile.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="fas fa-user-cog text-light fa-lg mr-3"></i>Profile</a></li>


            <li class="nav-item"><a href="dossier.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="far fa-address-book text-light fa-lg mr-3"></i>Mes Dossiers</a></li>

            <li class="nav-item"><a href="rendez-vous.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="far fa-calendar-check text-light fa-lg mr-3"></i>Mes Rendez-vous</a></li>

            <li class="nav-item"><a href="help.php" class="nav-link text-white p-3 mb-2 sidebar-link">
              <i class="fas fa-file-alt text-light fa-lg mr-3"></i>help!</a></li>

          </ul>
        </div>


        <!-- end of sidebar -->

        <!-- top-nav -->
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-info fixed-top py-2 top-navbar navbar-back">
          <div class="row align-items-center">

            <div class="col-md-3 my-2">
            </div>
            <div class="col-md-5">
              <?php echo display_session_message(); ?>
            </div>
              <div class="col-md-1">

              </div>

            <div class="col-md-3">
              <ul class="navbar-nav">
                <?php if ($session_patient->is_logged_in()) {
                ?>
                <li class="nav-item ml-md-auto border border-light rounded ">
                  <a href="../patientLogout.php" class="nav-link text-light font-weight-bold p-2">
                    Se Déconnecter </a></li>
                    <?php  } ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- end of top-nav -->



      </div>
      </div>
    </div>
</nav>
