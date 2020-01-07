<?php include "databaseobject.class.php" ?>
<?php

  class Patient extends DatabaseObject {

      static public $table_name='patient';
      static public $db_columns= ['id_patient' , 'nom_patient', 'prenom_patient', 'date_de_naissance' , 'sexe',
      'telephone', 'email', 'pass'];
      protected $pass_required = true;


      public function update() {
        if($this->pass != '') {
      $this->pass_required = false;
        }
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE " .static::$db_columns['0']. " = '"  . self::$database->escape_string($this->id_patient) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
      }


    public $id_patient;
    public $nom_patient;
    public $prenom_patient;
    public $date_de_naissance;
    public $sexe;
    public $telephone;
    public $email;
    public $pass;
    // ($id,$id_dossier,$nom_patient,$prenom_patient,
    // $date_de_naissance,$sexe,$telephone,$email,$pass)
    function __construct($args=[])
    {
      // $this->id=$args['id'];
      $this->nom_patient=$args['nom_patient'] ?? '';
      $this->prenom_patient=$args['prenom_patient'] ?? '';
      $this->date_de_naissance=$args['date_de_naissance'] ?? '';
      $this->sexe=$args['sexe'] ?? '';
      $this->telephone=$args['telephone'] ?? '';
      $this->email=$args['email'] ?? '';
      $this->pass=$args['pass'] ?? '';
    }
    static public function find_all_patient() {
      $sql = "SELECT * FROM " . static::$table_name;
      $sql .=" INNER JOIN rendez_vous ";
      $sql .="ON ".static::$table_name.".id_patient = " . "rendez_vous.id_patient ORDER BY date_rendez_vous ASC LIMIT 5";
      $result = self::$database->query($sql);
      if(!$result) {
        exit("Database query failed.");
      }
      return $result;
    }
    static public function find_all() {
      $sql = "SELECT * FROM " . static::$table_name ." ORDER BY nom_patient";
      return static::find_by_sql($sql);
    }
    public function name(){
      return "{$this->id_patient} - {$this->nom_patient} {$this->prenom_patient}";
    }
    public function validate() {
      $this->errors = [];

      if(is_blank($this->nom_patient)) {
        $this->errors[] = "Nom ne peut pas etre vide.";
      }
      if(is_blank($this->prenom_patient)) {
        $this->errors[] = "Prenom ne peut pas etre vide.";
      }


      if(is_blank($this->email)) {
        $this->errors[] = "Email ne peut pas etre vide.";
      } elseif (!has_length($this->email, array('max' => 255))) {
        $this->errors[] = "l'email doit avoir moin de 255 characters.";
      } elseif (!has_valid_email_format($this->email)) {
        $this->errors[] = "Email doit avoir un format valide.";
      } elseif (!has_unique_email_patient($this->email, $this->id_patient ?? 0)) {
        $this->errors[] = "email existe deja . veuiller le changer.";
      }
      if($this->pass_required) {
        if(is_blank($this->pass)) {
          $this->errors[] = "Password cannot be blank.";
        } elseif (!has_length($this->pass, array('min' => 12))) {
          $this->errors[] = "Password must contain 12 or more characters";
        } elseif (!preg_match('/[A-Z]/', $this->pass)) {
          $this->errors[] = "Password must contain at least 1 uppercase letter";
        } elseif (!preg_match('/[a-z]/', $this->pass)) {
          $this->errors[] = "Password must contain at least 1 lowercase letter";
        } elseif (!preg_match('/[0-9]/', $this->pass)) {
          $this->errors[] = "Password must contain at least 1 number";
        } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->pass)) {
          $this->errors[] = "Password must contain at least 1 symbol";
        }
      }
    return $this->errors;
    }

    static public function find_rendez_vous() {
      $sql = "SELECT * FROM " . static::$table_name;
      $sql .=" INNER JOIN rendez_vous ";
      $sql .="ON ".static::$table_name.".id_patient = " . "rendez_vous.id_patient";
      $sql .=" WHERE ".static::$table_name."id_patient = rendez_vous.id_patient";
      $result = self::$database->query($sql);
      if(!$result) {
        exit("Database query failed.");
      }
      return $result;
    }
    static public function find_by_email($email) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
      $obj_array = static::find_by_sql($sql);
      if(!empty($obj_array)) {
        return array_shift($obj_array);
      } else {
        return false;
      }
    }

  }


 ?>
