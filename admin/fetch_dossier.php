<?php include "../php/database.php" ?>
<?php include "../php/dossier.class.php" ?>
<?php include "../php/function.php" ?>

<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php
$dossier =new dossier;
$output = '';
if(isset($_POST["query"]))
{
	// $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $search = $dossier->escap_s($_POST["query"]);

  $query  = "SELECT * FROM dossier";
  $query  .=" INNER JOIN patient ";
  $query  .="ON dossier.id_patient = patient.id_patient

	WHERE nom_dossier LIKE '%".$search."%'
	OR prenom_patient LIKE '%".$search."%'
	OR email LIKE '%".$search."%'
  OR id_dossier LIKE '%".$search."%'
  OR telephone LIKE '%".$search."%'
  OR date_de_creation_dossier LIKE '%".$search."%'
	 LIMIT 5";

$result = $dossier->query($query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
  <table class="table table-striped table-bordered text-center table-responsive-md">
    <thead>
      <tr>
        <th scope="col">#Id Dossier</th>
        <th scope="col">Nom du patient</th>
        <th scope="col">Prenom du patient</th>
        <th scope="col">Nom du Dossier</th>
        <th scope="col">Date de creation du Dossier</th>
        <th scope="col">Age</th>
        <th scope="col">Ajouter Diagnostique</th>
        <th scope="col" class="text-center">Les diagnostiques</th>
        <th scope="col" class="text-center">Suprimer</th>
      </tr>
    </thead>
    <tbody>';
	while($row = mysqli_fetch_array($result))
	{
    $id=$row["id_dossier"];
		$output .= '
			<tr>
              <td>'.$id.'</td>
              <td>'.$row["nom_patient"].'</td>
              <td>'.$row["prenom_patient"].'</td>
              <td>'.$row["nom_dossier"].'</td>
      				<td>'.$row["date_de_creation_dossier"].'</td>';
    $output.='<td>';
        $dateOfBirth = $row['date_de_naissance'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        // echo h($diff->format("%y"));
        $output.=$diff->format("%y").'</td>';
    $output.='<td class="text-center  text-light"><a href="ajouterDiagnostiqueid.php?id_dossier='.$id.'" name="button" class="btn btn-info" >Ajouter Un Diagnostique</a></td>
              <td class="text-center  text-light"><a href="diagnostiques.php?id_dossier='.$id.'" name="button" class="btn btn-success" >Diagnostiques</a></td>
              <td class="text-center  text-light"><a href="suprimerDossier.php?id_dossier='.$id.'" name="button" class="btn btn-danger" >Suprimer</a></td>

			</tr>
		';
	}
      $output.='
  </table>
  <br>';
	echo $output;
}
else
{
  echo '<div class="text-center">
  <span class="h4 text-danger mb-4">Le dossier n\'existe pas</span>
  </div>
  <br>';
}
}

?>
