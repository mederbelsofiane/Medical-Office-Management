<?php include "databaseobject.class.php" ?>
<?php

  class Urgence extends DatabaseObject {

      static public $table_name='urgence';
      static public $db_columns= ['id_urgence' , 'nom', 'prenom', 'sexe' , 'date_de_naissance' ,
       'adress_urgence', 'type_urgence', 'description_urgence'];

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
        if($result) {
          $this->id_urgence = self::$database->insert_id;
        }
        return $result;
      }
      public function update() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE " .static::$db_columns['0']. " = '"  . self::$database->escape_string($this->id_urgence) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
      }
      public function save() {
        // A new record will not have an ID yet
        if(isset($this->id_urgence)) {
          return $this->update();
        } else {
          return $this->create();
        }
      }

     public function delete() {
       $sql = "DELETE FROM " . static::$table_name . " ";
       $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_urgence) . "' ";
       $sql .= "LIMIT 1";
       $result = self::$database->query($sql);
       return $result;
     }

    public $id_urgence ;
    public $nom;
    public $prenom;
    public $sexe;
    public $date_de_naissance;
    public $adress_urgence;
    public $type_urgence;
    public $description_urgence;
    function __construct($args=[])
    {
      // $this->id=$args['id'];
      $this->nom=$args['nom'] ?? '';
      $this->prenom=$args['prenom'] ?? '';
      $this->sexe=$args['sexe'] ?? '';
      $this->date_de_naissance=$args['date_de_naissance'] ?? '';
      $this->adress_urgence=$args['adress_urgence'] ?? '';
      $this->type_urgence=$args['type_urgence'] ?? '';
      $this->description_urgence=$args['description_urgence'] ?? '';
    }
    public function name(){
      return "{$this->id_urgence} - {$this->nom} {$this->prenom}";
    }
    public function validate() {
      $this->errors = [];

      if(is_blank($this->nom)) {
        $this->errors[] = "Nom ne peut pas etre vide.";
      }
      if(is_blank($this->prenom)) {
        $this->errors[] = "Prenom ne peut pas etre vide.";
      }

      return $this->errors;
    }

  }


 ?>
