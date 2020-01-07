<?php

class SessionPatient {

  private $idp;
  public $nom_patient;
  public $prenom_patient;
  private $last_login_patient;

  public const MAX_LOGIN_AGE = 60*60*24;

  public function get_id(){
    $ids=$this->idp;
    return $ids;
  }

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($patient) {
    if($patient) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->idp = $_SESSION['idp'] = $patient->id_patient;
      $this->nom_patient = $_SESSION['nom_patient'] = $patient->nom_patient;
      $this->prenom_patient = $_SESSION['prenom_patient'] = $patient->prenom_patient;
      $this->last_login_patient = $_SESSION['last_login_patient'] = time();

    }
    return true;
  }

  public function is_logged_in() {
    return (isset($this->idp) && $this->last_login_is_recent());
  }

  public function logout() {
    unset($_SESSION['idp']);
    unset($_SESSION['nom_patient']);
    unset($_SESSION['prenom_patient']);
    unset($_SESSION['last_login_patient']);
    unset($this->idp);
    unset($this->nom_patient);
    unset($this->prenom_patient);
    unset($this->last_login_patient);
    return true;
  }
  private function last_login_is_recent(){
    if (!isset($this->last_login_patient)) {
      return false;
    } elseif(($this->last_login_patient + self::MAX_LOGIN_AGE) < time()) {
      return false;
    }else{
    return true;
    }
  }

  private function check_stored_login() {
    if(isset($_SESSION['idp'])) {
      $this->idp = $_SESSION['idp'];
      $this->nom_patient = $_SESSION['nom_patient'];
      $this->prenom_patient = $_SESSION['prenom_patient'];
      $this->last_login_patient = $_SESSION['last_login_patient'];
    }
  }

}

?>
