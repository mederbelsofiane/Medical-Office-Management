<?php include "databaseobject.class.php" ?>
<?php

  class Diagnostique extends DatabaseObject {

      static public $table_name='diagnostique';
      static public $db_columns= ['id_diagnostique' , 'id_dossier' , 'date_de_creation' , 'id_medecin' , 'diagnostique'];

      public function ajouter() {

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
          $this->id_diagnostique = self::$database->insert_id;
        }
        return $result;
      }

     public function delete() {
       $sql  = "DELETE FROM " . static::$table_name . " ";
       $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_diagnostique) . "' ";
       $sql .= "LIMIT 1";
       $result = self::$database->query($sql);
       return $result;
     }



    public $id_diagnostique;
    public $id_dossier;
    public $date_de_creation;
    public $id_medecin;
    public $diagnostique;

    function __construct($args=[])
    {
      $this->id_dossier=$args['id_dossier'] ?? '';
      $this->date_de_creation=$args['date_de_creation'] ?? '';
      $this->id_medecin=$args['id_medecin'] ?? '';
      $this->diagnostique=$args['diagnostique'] ?? '';

    }
    public function name(){
      return "{$this->id_diagnostique}";
    }

    // public function validate() {
    //   $this->errors = [];
    //
    //   if(is_blank($this->date_de_creation)) {
    //     $this->errors[] = "Nom ne peut pas etre vide.";
    //   }
    //   return $this->errors;
    // }
  }


 ?>
