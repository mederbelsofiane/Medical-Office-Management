<?php include "php/database.php" ?>
<?php include "php/patient.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init_patient.php') ?>
<?php
   if ($session_patient->is_logged_in()) {
      $id_patient = $session_patient->get_id();
    }?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="title icon" type="image/png" href="images/a-86-512.png"/>
 <link rel="stylesheet" href="ressources/css/style3.css">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <script src="fontawesome/js/all.js"></script>
 <title>Cabinet Medical</title>
</head>

<body>

 <nav class="navbar navbar-expand-md navbar-light p-0 fixed-top" style="background-color: #dbdcff; opacity:0.7;">
   <a class="navbar-brand" href="#"><i class="far fa-hospital text-primary fa-2x ml-4"></i></a>
   <button type="button" class="btn btn-light navbar-toggler" data-toggle="collapse" data-target="#nav"><span class="navbar-toggler-icon"></span></button>
     <div class="collapse navbar-collapse justify-content-between" id="nav">
     <ul class="navbar-nav">
       <li class="nav-item"><a class="nav-link text-dark font-weight-bold text-uppercase px-3" href="#home">accueil</a></li>

       <li class="nav-item dropdown">
         <a class="nav-link text-dark font-weight-bold text-uppercase px-3 dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
         <div class="dropdown-menu">
           <a class="dropdown-item font-weight-bold" href="#Urgence">Urgence</a>
           <a class="dropdown-item font-weight-bold" href="#Consultation">Consultation</a>
           <a class="dropdown-item font-weight-bold" href="#Radio">Radio</a>
           <a class="dropdown-item font-weight-bold" href="#Rendez-Vous">Rendez-vous</a>
         </div>
       </li>
       <li class="nav-item"><a class="nav-link text-dark font-weight-bold text-uppercase px-3" href="#team">Equipe</a></li>
       <li class="nav-item"><a class="nav-link text-dark font-weight-bold text-uppercase px-3" href="#contact">Support</a></li>
     </ul>
     <div class="dropdown">
       <a class="nav-link text-dark font-weight-bold text-uppercase mr-3 dropdown-toggle" href="#" data-toggle="dropdown">Connexion</a>
         <div class="dropdown-menu">
           <a class="dropdown-item font-weight-bold" href="patientLogin.php">Patient</a>
           <a class="dropdown-item font-weight-bold" href="secretaireLogin.php">Sercretaire</a>
           <a class="dropdown-item font-weight-bold" href="medecinLogin.php">Medecin</a>
         </div>
     </div>
     </div>
 </nav>

 <section id="home">
   <div class="container-fluid">
     <div class="row bg-dark justify-content-around align-items-center" id="banner-bg" >
          <div class="col-sm-10 text-center pt-3 pb-4" style="background: rgba(0, 0, 0, 0.5); height: 470px; ">
              <h1 class="display-3 text-capitalize"><span class="text-info font-weight-bold">Healthdoc!!</span></h1>
                <h1><span class="text-white font-weight-bold">Votre dossier médical en deux clics</span></h1>
              <h2 class="font-weight-light font-italic text-light">Pour mieux suivre votre état de santé.</h2>
              <a href="patient/rendez-vous.php?id_patient=<?php if (isset($id_patient)) {
              echo $id_patient;}  ?>" class="btn btn-info btn-lg px-4 m-3">Rendez-Vous</a>
              <a href="urgence.php" class="btn btn-danger btn-lg px-4 m-3">Urgence!</a><br>
              <a href="patient/dossier.php?id_patient=<?php if (isset($id_patient)) {
              echo $id_patient;}  ?>" class="btn btn-success btn-lg px-4 mt-1 ">
              Consulter Votre Dossier</a>
          </div>
       </div>
     </div>
  </section>


  <section>

      <div class="container-fluid bg-light ">
      <div class="row">
        <div class="col text-center mb-3">
          <h1 class="text-danger display-3 font-weight-bold">Services</h1>
          <p class="lead text-secondary">Les différent services fournit sur nos cabinet medical, plus d'information ci-dessous !</p>
        </div>
      </div>

      <div class="row text-center px-3" id="Urgence">
        <div class="col-lg-3">
           <i class="fas fa-ambulance fa-5x text-danger m-3"></i>
           <h1 class="text-secondary">Urgence</h1>
           <p class="text-muted text-justify my-4">Nous fournissont un service d'urgence pour nos patient,
              qui seront pris en charge aux plus vite grace à notre system et nous enverron des ambulances et feront
              des appels afin de vous assister du mieux possible, et de vous rassuré. ( ce service est a utiliser uniquement en cas d'urgence).  </p>
           <a href="urgence.php" class="btn btn-outline-danger mb-3 align-bottom">J'ai une urgence</a>


        </div>
        <div class="col-lg-3" id="Consultation">
          <i class="far fa-address-book fa-5x text-info m-3"></i>
          <h1 class="text-secondary">Consultation</h1>
          <p class="text-muted text-justify my-4">Le Service de consultation se fait via un compte crée aux niveau de l'un de nos cabinet,
             ce compte vous donnera accées aux panel patient dans lequel vous pourrais voir, vos dossiers, ainsi que leurs diagnostique,
             prendre ds rendez vous et vois votre profile.(connexion requise pour utiliser ce service) </p>
          <a href="patient/dossier.php?id_patient=<?phpif (isset($id_patient)) {
            // code...
          echo $id_patient;}   ?>" class="btn btn-outline-info mb-3 align-text-bottom">Consulter mon dossier</a>


        </div>
        <div class="col-lg-3" id="Radio">
          <i class="fas fa-biohazard fa-5x text-warning m-3"></i>
          <h1 class="text-secondary">Radio </h1>
          <p class="text-muted text-justify  my-4">Comme chaque clinique digne de ce nom, nous avont un service de radiologie tré avancé qui avec
             l'assistance de medecin expérimenté nous vous aideront a trouvé le problem si il existe ainsi que le remede approprier dans les plus bref délais.
              ( service disponible sur nos cabinet )</p>
          <a href="patient/dossier.php?id_patient=<?phpif (isset($id_patient)) {
            // code...
          echo $id_patient;}   ?>" class="btn btn-outline-warning mb-3">Faire des radios</a>


        </div>
        <div class="col-lg-3" id="Rendez-Vous">
          <i class="far fa-calendar-check fa-5x text-success m-3"></i>
          <h1 class="text-secondary">Rendez-vous</h1>
          <p class="text-muted text-justify my-4">Nous fournissont un service de reservation de rendez-vous enligne dpuis le panel patient ou  en contactant l'une de nos secretaire
             (pour utiliser ce service autant que patient vous devait avoir un compte crée aux niveau de l'un de nos cabinet par nos secrétaire. )</p>
             <br>
          <a href="patient/rendez-vous.php?id_patient=<?phpif (isset($id_patient)) {
            // code...
          echo $id_patient;}   ?>" class="btn btn-outline-success mb-3">Prendre rendez vous</a>


        </div>
        <br>

      </div>
    </div>
  </section>

  <!-- <section >
       <div class="container-fluid">
         <div class="row">
           <div class="col text-center mb-3">
             <h1 class="text-info display-4 font-weight-bold">Ce Que nous offrons de plus</h1>
             <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, incidunt laudantium a!</p>
           </div>
         </div>
         <div class="row">
           <div class="col lg-">



           </div>
           <div class="col">


           </div>
           <div class="col">


           </div>
         </div>
       </div>





  </section> -->


  <section class="p-sm-5 p-2" style="background:rgba(155,187,198,1);">
     <div class="container-fluid" id="team">
          <div class="row">
             <div class="col text-center mb-3">
                 <h1 class="text-info display-2">Notre Equipe</h1>
                 <p class="lead text-light"> Une selection de medecins plein d'experience et de savoir faire pour vous assister et vous soigné du mieux possible</p>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-3 col-sm-10 mx-auto mb-4">
                 <div class="card">
                     <img src="images/doc2.jpg" class="card-img-top">
                     <div class="card-body">
                         <div class="card-title">
                             <h3 class="text-muted">Mederbel Sofiane</h3>
                         </div>
                         <div class="card-subtitle">
                             <p class="lead text-secondary">Neurologue</p>
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
             <div class="col-lg-3 col-sm-10 mx-auto mb-4">
                 <div class="card">
                     <img src="images/doc3.jpg" class="card-img-top">
                     <div class="card-body">
                         <div class="card-title">
                             <h3 class="text-muted">Ouhaibia Basma</h3>
                         </div>
                         <div class="card-subtitle">
                             <p class="lead text-secondary">Cardiologue</p>
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
             <div class="col-lg-3 col-sm-10 mx-auto mb-4">
                 <div class="card">
                      <img src="images/doc4.jpg" class="card-img-top">
                     <div class="card-body">
                         <div class="card-title">
                             <h3 class="text-muted">Hichem Benhamou</h3>
                         </div>
                         <div class="card-subtitle">
                             <p class="lead text-secondary">Cherurgien</p>
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
                 <div class="col-lg-3 col-sm-10 mx-auto mb-4">
                   <div class="card">
                     <img src="images/doc6.jpg" class="card-img-top">
                     <div class="card-body">
                       <div class="card-title">
                         <h3 class="text-muted">Timtaoucine Meriem</h3>
                       </div>
                       <div class="card-subtitle">
                         <p class="lead text-secondary">Ingénieur Biomedical</p>
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
  </section>
  <section class="p-5 bg-light" id="contact">
     <div class="container-fluid">
          <div class="row">
             <div class="col text-center mb-3">
                 <h1 class="text-info display-2">Contactez nous</h1>
                 <p class="lead text-secondary">pour plus d'information veiller nous Envoyer un message et ne vous reponderons aux plus vite</p>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-lg-6 col-md-8 col-sm-10">
                 <div class="text-center text-secondary">
                     <h2>Des Questions ?</h2>
                     <p>Restez connecter</p>
                 </div>
                 <form class="text-muted">
                     <div class="form-group">
                         <label for="name">Nom</label>
                         <input type="text" class="form-control" id="name">
                     </div>
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" id="email">
                     </div>
                     <div class="form-group">
                         <label for="message">Message</label>
                         <textarea class="form-control" id="message" rows="3"></textarea>
                     </div>
                     <button class="btn btn-outline-info btn-block" type="submit">Envoyer Question</button>
                 </form>
             </div>
         </div>
     </div>
  </section>
  <footer style="background-color:#316080;">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-lg-4 py-4 px-5 text-light">
          <h3>A propos de nous</h3>
          <p class="text-justify pt-3">Un cabinet medical crée en 2010 à blida, qui a des medecins de différente spécialité ainsi que des chirurgiens, notre objectif et d'etre le meillieur cabinet medical d'algerie. </p>
        </div>
        <div class="col-lg-4 py-4 px-5 text-light">
          <h3>Liens Utile</h3>
          <ul class="m-3 pt-2 text-info">
            <li><a href="#" class="text-light">accueil</a></li>
            <li><a href="#" class="text-light">Services</a></li>
            <li><a href="#" class="text-light">Support</a></li>
          </ul>
        </div>
        <div class="col-lg-4 py-4 px-5">
          <h3 class=" text-light">Suivez-Nous</h3>
          <div class="my-4">
            <a href="#"><i class="fab fa-facebook fa-2x mx-2 text-light"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x mx-2 text-info"></i></a>
            <a href="#"><i class="fab fa-youtube fa-2x mx-2 text-danger "></i></a>
            <a href="#"><i class="fab fa-linkedin-in fa-2x mx-2 text-light"></i></a>

          </div>
        </div>
      </div>
      <hr>
      <div class="row ">
        <div class="col text-center">
          <p class="text-dark py-3">
         © Copyright Blida-Healthcare. All Rights Reserved
         <p>
        </div>
      </div>
    </div>

  </footer>

 <script src="ressources/js/acc.js"></script>
 <script src="bootstrap/js/jquery.min.js" ></script>
 <script src="bootstrap/js/popper.min.js"></script>
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
