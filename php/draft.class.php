<?php
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
    $this->id_medecin = self::$database->insert_id;
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
  $sql .= " WHERE " .static::$db_columns['0']. " = '"  . self::$database->escape_string($this->id_medecin) . "' ";
  $sql .= "LIMIT 1";
  $result = self::$database->query($sql);
  return $result;
}
public function save() {
  // A new record will not have an ID yet
  if(isset($this->id_medecin)) {
    return $this->update();
  } else {
    return $this->create();
  }
}

public function delete() {
 $sql = "DELETE FROM " . static::$table_name . " ";
 $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_patient) . "' ";
 $sql .= "LIMIT 1";
 $result = self::$database->query($sql);
 return $result;
}
?>
