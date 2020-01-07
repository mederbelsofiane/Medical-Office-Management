<?php include "php/database.php" ?>
<?php include "php/medecin.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init_medecin.php') ?>
<?php
  $session_medecin->logout($medecin);
  redirect_to('medecinLogin.php')?>
