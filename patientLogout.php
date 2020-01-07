<?php include "php/database.php" ?>
<?php include "php/patient.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init_patient.php') ?>
<?php
  $session_patient->logout($patient);
  redirect_to('patientLogin.php')?>
