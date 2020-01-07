<?php include "session-medecin.class.php"?>
<?php
  $database = db_connect();
  DatabaseObject::set_database($database);

  $session_medecin = new SessionMedecin;
 ?>
