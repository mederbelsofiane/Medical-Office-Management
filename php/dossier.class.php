<?php include "databaseobject.class.php" ?>
<?php

  class Dossier extends DatabaseObject {

      static public $table_name='dossier';
      static public $db_columns= ['id_dossier' , 'id_patient' , 'nom_dossier' , 'date_de_creation_dossier'];

      public function ajouter() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = self::$database->query($sql);

        if(!$result) {
          die("Query Failed");
        }else {
          $this->id_dossier = self::$database->insert_id;
        }
        return $result;
      }


      public function delete() {
        $sql  = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_dossier) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
      }

      // public function delete() {
      //    // $id_delete=self::$database->escape_string($this->id_dossier);
      //      $sql  = "DELETE FROM dossier WHERE id_dossier " . " = '" . self::$database->escape_string($this->id_dossier) . "' ; ";
      //      $sql .= "DELETE FROM diagnostique WHERE id_dossier " . " = '" . self::$database->escape_string($this->id_dossier) . "' ";
      //      $result = self::$database->query($sql);
      //      if (!$result) {
      //        die('Query Failed');
      //        // code...
      //      }
      //      return $result;
      //    }

        // public function delete() {
        //      $sql  = "DELETE dossier , diagnostique FROM dossier INNER JOIN diagnostique " ;
        //      $sql .= "WHERE dossier.id_dossier = diagnostique.id_dossier AND dossier.id_dossier = ";
        //      $sql .="'". self::$database->escape_string($this->id_dossier) . "' ";
        //      $result = self::$database->query($sql);
        //      if (!$result) {
        //        die('Query Failed');
        //        // code...
        //      }
        //      return $result;
        //    }




    public $id_dossier;
    public $id_patient;
    public $nom_dossier;
    public $date_de_creation_dossier;

    function __construct($args=[])
    {
      $this->id_patient=$args['id_patient'] ?? '';
      $this->nom_dossier=$args['nom_dossier'] ?? '';
      $this->date_de_creation_dossier=$args['date_de_creation_dossier'] ?? '';
    }
    public function name(){
      return "{$this->id_dossier} - {$this->nom_dossier} - {$this->date_de_creation_dossier}";
    }

    public function validate() {
      $this->errors = [];
      if(is_blank($this->nom_dossier)) {
        $this->errors[] = "Le Nom du dossier ne peut pas etre vide.";
      }

      if(is_blank($this->date_de_creation_dossier)) {
        $this->errors[] = "Nom ne peut pas etre vide.";
      }
      return $this->errors;
    }
  }


 ?>
