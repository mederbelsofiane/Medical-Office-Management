<?php include "session-patient.class.php"?>
<?php
  $database = db_connect();
  DatabaseObject::set_database($database);

  $session_patient = new SessionPatient;
 ?>
