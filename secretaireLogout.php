<?php include "php/database.php" ?>
<?php include "php/secretaire.class.php" ?>
<?php include "php/function.php" ?>
<?php include "php/validation_fonctions.php" ?>
<?php include "php/errors_status.php" ?>
<?php require('php/dbinfo.php') ?>
<?php require('php/init.php') ?>
<?php
  $session_secretaire->logout($secretaire);
  redirect_to('secretaireLogin.php')?>
