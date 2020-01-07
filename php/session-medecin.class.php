<?php

class SessionMedecin {

  private $idm;
  public $nom_medecin;
  public $prenom_medecin;
  public $specialite;
  private $last_login_medecin;

  public const MAX_LOGIN_AGE = 60*60*24;

  public function get_id(){
    $ids=$this->idm;
    return $ids;
  }

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($medecin) {
    if($medecin) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->idm =  $_SESSION['idm'] = $medecin->id_medecin;
      $this->nom_medecin =  $_SESSION['nom_medecin'] = $medecin->nom_medecin;
      $this->prenom_medecin =  $_SESSION['prenom_medecin'] = $medecin->prenom_medecin;
      $this->specialite =  $_SESSION['specialite'] = $medecin->specialite;
      $this->last_login_medecin =  $_SESSION['last_login_medecin'] = time();
    }
    return true;
  }

  public function is_logged_in() {
    return (isset($this->idm) && $this->last_login_is_recent());
  }

  public function logout() {
    unset($_SESSION['idm']);
    unset($_SESSION['nom_medecin']);
    unset($_SESSION['prenom_medecin']);
    unset($_SESSION['specialite']);
    unset($_SESSION['last_login_medecin']);
    unset($this->idm);
    unset($this->nom_medecin);
    unset($this->prenom_medecin);
    unset($this->specialite);
    unset($this->last_login_medecin);
    return true;
  }
  private function last_login_is_recent(){
    if (!isset($this->last_login_medecin)) {
      return false;
    } elseif(($this->last_login_medecin + self::MAX_LOGIN_AGE) < time()) {
      return false;
    }else{
    return true;
    }
  }

  private function check_stored_login() {
    if(isset($_SESSION['idm'])) {
      $this->idm = $_SESSION['idm'];
      $this->nom_medecin = $_SESSION['nom_medecin'];
      $this->prenom_medecin = $_SESSION['prenom_medecin'];
      $this->specialite = $_SESSION['specialite'];
      $this->last_login_medecin = $_SESSION['last_login_medecin'];
    }
  }

}

?>
