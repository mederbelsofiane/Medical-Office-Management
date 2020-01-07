<?php
$result = Diagnostique::find_all_dossier_patient_diagnostique_medecin();
?>
<?php   while($row = $result->fetch_assoc())
{   if (  ($id_diagnostique==$row['id_diagnostique'])) {

  ?>
  <div class="text-center font-weight-bold">
    <h3>Info diagnostique, Dossier (<?php echo $row['nom_dossier']; ?>)</h3>
  </div>

<table class="table table-striped table-bordered text-center table-responsive-md">
  <thead>
    <tr>
      <th scope="col">#Id diagnostique</th>
      <th scope="col">Date de creation du diagnostique</th>
      <th scope="col">#Id patient</th>
      <th scope="col">Nom du patient</th>
      <th scope="col">Prenom du patient</th>
      <th scope="col">Age</th>

    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row"><?php echo h($row['id_diagnostique']); ?></th>
      <td><?php echo h($row['date_de_creation']); ?></td>
      <td><?php echo h($row['id_patient']); ?></td>
      <td><?php echo h($row['nom_patient']); ?></td>
      <td><?php echo h($row['prenom_patient']); ?></td>
      <td>
        <?php
        $dateOfBirth = $row['date_de_naissance'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        echo h($diff->format('%y'));
        ?>
      </td>
    </tr>


  </tbody>
</table>
<div class="text-center font-weight-bold">
 <h3>Diagnostique</h3>

</div>
<table class="table table-striped table-bordered text-center table-responsive-md">
 <thead>
   <tr>
     <th scope="col" class="text-center">#Id medecin</th>
     <th scope="col" class="text-center">Specialite du medecin</th>
     <th scope="col" class="text-center">Nom du medecin</th>
     <th scope="col" class="text-center">Prenom du medecin</th>

   </tr>
 </thead>
 <tbody>

<tr>
 <td><?php echo h($row['id_medecin']); ?></td>
 <td><?php echo h($row['specialite']); ?></td>
 <td><?php echo h($row['nom_medecin']); ?></td>
 <td><?php echo h($row['prenom_medecin']); ?></td>
</tr>


</tbody>
</table>
<table class="table table-striped table-bordered text-center table-responsive-md">
<thead>
<tr>
<th scope="col" class="text-center">Diagnostique</th>
</tr>
</thead>
<tbody>
<tr>

<td class="text-danger"><?php echo h($row['diagnostique']); ?></td>
</tr>
</tbody>
</table>
  <?php }}?>
