<?php include "databaseobject.class.php" ?>
<?php
 /**
 *
 */
  class Contact extends DatabaseObject
  {
    static $table_name="contact";
    static $db_columns=['id_contact','date_de_creation','nom_c','email_c','message'];

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
        $this->id_contact = self::$database->insert_id;
      }
      return $result;
    }
    public function delete() {
      $sql  = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_contact) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
    }

    public $id_contact;
    public $date_de_creation;
    public $nom_c;
    public $email_c;
    public $message;

    public function __construct($args=[])
    {
      $this->id_contact=$args['id_contact'] ?? '';
      $this->date_de_creation=$args['date_de_creation'] ?? '';
      $this->nom_c=$args['nom_c'] ?? '';
      $this->email_c=$args['email_c'] ?? '';
      $this->message=$args['message'] ?? '';

    }
    public function name(){
      return "{$this->id_contact} - {$this->nom_c} - {$this->date_de_creation}";
    }

    public function validate() {
      $this->errors = [];
      if(is_blank($this->nom_c)) {
        $this->errors[] = "Le Nom du dossier ne peut pas etre vide.";
      }

      if(is_blank($this->email_c)) {
        $this->errors[] = "l'email ne peut pas etre vide.";
      } elseif (!has_length($this->email, array('max' => 255))) {
        $this->errors[] = "l'email doit avoir moin de 255 characters.";
      } elseif (!has_valid_email_format($this->email)) {
        $this->errors[] = "Email doit avoir un format valide.";
      }
      if(is_blank($this->message)) {
        $this->errors[] = "Veuiller Saisir votre message : (le message ne peut pas etre vide!).";
      }
      return $this->errors;
    }

  }
 ?>
