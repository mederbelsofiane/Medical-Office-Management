
<div class="font-weight-bold">
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="">Nom du dossier :</label>
    <input type="text" name="dossier[nom_dossier]" placeholder="Nom Dossier..(dossier cardiaque, peau...)" class="form-control">
  </div>
  </div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="">Date De Creation :</label>
  <input type="date" name="dossier[date_de_creation_dossier]" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>"class="form-control">
</div>
</div>
<div class="form-row">
<label for="">Patient : </label>
<?php
$result = Dossier::all_patient();
?>
<select class="custom-select" name="dossier[id_patient]">

  <?php   while($row = $result->fetch_assoc())
  { $patient = $row['id_patient']."- ".$row['nom_patient']." ".$row['prenom_patient'];
    $id_patient=$row['id_patient'];

echo "<option value='$id_patient'>$patient</option>";?>

<?php } ?>
</select>
</div>
