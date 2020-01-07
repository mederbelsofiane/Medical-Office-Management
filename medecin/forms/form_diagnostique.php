
<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="">Date de creation :</label>
  <input type="date" name="diagnostique[date_de_creation]" min="1950-01-01" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" class="form-control">
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-8">
    <label for="">Le patient Diagnostiqué :</label>
<?php
$result = Diagnostique::find_all_dossier_patient_nom();
?>
<select class="custom-select" name="diagnostique[id_dossier]">

  <?php   while($row = $result->fetch_assoc())
  { $dossier = $row['id_patient']."- ".$row['nom_patient']." ".$row['prenom_patient'] ." / nom dossier : ".$row['id_dossier']."-".$row['nom_dossier']. " / ".$row['date_de_creation_dossier'] ;
    $id_dossier=$row['id_dossier'];

echo "<option value='$id_dossier'>$dossier</option>";?>

<?php } ?>
</select>
</div>
</div>

<div class="form-row mt-1">
  <div class="form-group col-md-8">
<?php
$result = Diagnostique::all_medecin();
?>



<?php   while($row = $result->fetch_assoc())
{if ($id_link==$row['id_medecin']) {

   $medecin = $row['id_medecin']."- ".$row['nom_medecin']." ".$row['prenom_medecin']." : ".$row['specialite'];
}
} ?>
<h4 for="">Le medecin diagnostiquant :</h4>
   <h4 class="text-danger"><?php echo $medecin; ?></h4>
                  <input type="hidden"  name="diagnostique[id_medecin]" value="<?php echo $id_link; ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-8">
  <label for="">Diagnostique :</label>
  <textarea class="form-control" name="diagnostique[diagnostique]" rows="3"></textarea>
</div>
</div>
</div>
