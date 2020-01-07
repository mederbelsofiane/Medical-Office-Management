<?php include "../php/database.php" ?>
<?php include "../php/patient.class.php" ?>
<?php include "../php/function.php" ?>

<?php require('../php/dbinfo.php') ?>
<?php require('../php/init.php') ?>
<?php
$patient =new Patient;
$output = '';
if(isset($_POST["query"]))
{
	// $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $search = $patient->escap_s($_POST["query"]);
	$query = "
	SELECT * FROM patient
	WHERE nom_patient LIKE '%".$search."%'
	OR prenom_patient LIKE '%".$search."%'
	OR email LIKE '%".$search."%'
  OR id_patient LIKE '%".$search."%'
  OR telephone LIKE '%".$search."%'
	 LIMIT 5";
// else
// {
// 	// $query = "
// 	// SELECT * FROM tbl_customer ORDER BY CustomerID";
// }
$result = $patient->query($query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table-striped table-bordered text-center table-responsive-md">
						<tr>
							<th scope="col">Nom Patient</th>
							<th scope="col">Prenom Patient</th>
							<th scope="col">Age</th>
							<th scope="col">Telephone</th>
              <th scope="col">Email</th>
              <th scope="col">Dossier</th>
              <th scope="col">Details</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
    $id=$row["id_patient"];
		$output .= '
			<tr>
      				<td>'.$row["nom_patient"].'</td>
      				<td>'.$row["prenom_patient"].'</td>';
    $output.='<td>';
        $dateOfBirth = $row['date_de_naissance'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        // echo h($diff->format("%y"));
        $output.=$diff->format("%y").'</td>';
    $output.='
      				<td>'.$row["telephone"].'</td>
              <td>'.$row["email"].'</td>';
    $output.='<td class="text-center  text-light"><a href="dossierPatient.php?id_patient='.$id.'" name="button" class="btn btn-info" >Voir Dossier</a></td>
              <td class="text-center  text-light"><a href="patientDetail.php?id_patient='.$id.'" name="button" class="btn btn-success" >Détail</a></td>
			</tr>
		';
	}
      $output.='
  </table>
  <hr><hr>
  <br>';
	echo $output;
}
else
{
	echo '<div class="text-center">
  <span class="h4 text-danger mb-4">Le patient n\'existe pas</span>
  </div>
  <hr><hr>
  <br>

  ';
}
}
?>
