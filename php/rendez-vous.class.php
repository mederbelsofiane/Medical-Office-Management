
<?php include "databaseobject.class.php" ?>
<?php

  class RendezVous extends DatabaseObject {

      static public $table_name='rendez_vous';
      static public $db_columns= ['id_rendez_vous' , 'id_patient' , 'date_rendez_vous' , 'heure_d' ,
      'heure_fin'];

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
          $this->id_rendez_vous = self::$database->insert_id;
        }
        return $result;
      }

     public function delete() {
       $sql = "DELETE FROM " . static::$table_name . " ";
       $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_rendez_vous) . "' ";
       $sql .= "LIMIT 1";
       $result = self::$database->query($sql);
       return $result;
     }









    public $id_rendez_vous;
    public $id_patient;
    public $date_rendez_vous;
    public $heure_d;
    public $heure_fin;
    function __construct($args=[])
    {
      $this->id_patient=$args['id_patient'] ?? '';
      $this->date_rendez_vous=$args['date_rendez_vous'] ?? '';
      $this->heure_d=$args['heure_d'] ?? '';
      // $this->specialite=$args['heure_fin'] ?? '';
      // $this->heure_d=$args['heure_d'] ?? '';
      $this->heure_fin=$args['heure_fin'] ?? '';
     }
    public function name(){
      return "{$this->date_rendez_vous} - {$this->heure_d}-{$this->heure_fin} ";
    }

    public function validate() {
      $this->errors = [];

      if(is_blank($this->date_rendez_vous)) {
        $this->errors[] = "date ne peut pas etre vide.";
      }
      return $this->errors;
    }
  }


 ?>
