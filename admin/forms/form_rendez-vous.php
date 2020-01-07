
<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="">Date Du rendez_vous :</label>
  <input type="date" name="rendez_vous[date_rendez_vous]" min="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="">
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="">heure de debut du rendez-vous  :</label>
    <input type="time" name="rendez_vous[heure_d]" class="form-control" >
  </div>
  <div class="form-group col-md-6">
    <label for="">heure de la fin du rendez-vous</label>
    <input type="time" name="rendez_vous[heure_fin]" class="form-control" >
  </div>
</div>
<?php
$result = RendezVous::all_patient();
?>
<select class="custom-select" name="rendez_vous[id_patient]">

  <?php   while($row = $result->fetch_assoc())
  { $patient = $row['id_patient']."- ".$row['nom_patient']." ".$row['prenom_patient'];
    $id_patient=$row['id_patient'];

echo "<option value='$id_patient'>$patient</option>";?>

<?php } ?>
</select>
</div>
