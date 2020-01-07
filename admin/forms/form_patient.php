<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_patient">Nom Du patient :</label>
  <input type="text" name="patient[nom_patient]" class="form-control" value="<?php echo  h($patient->nom_patient);  ?>" placeholder="Nom">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="prenom_patient">Prenom du patient :</label>
<input type="text" name="patient[prenom_patient]" class="form-control" value="<?php echo  h($patient->prenom_patient);  ?>" placeholder="Prenom">
</div>
<div class="form-group col-md-6">
<label for="date_de_naissance">Date de naissance :</label>
<input type="date" name="patient[date_de_naissance]" class="form-control" value="<?php echo  h($patient->date_de_naissance);  ?>" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
</div>

</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="telephone">Numero de telephone :</label>
<input type="text" name="patient[telephone]"   class="form-control" value="<?php echo  h($patient->telephone);  ?>" placeholder="...">
</div>
<div class="form-group col-md-6">
<label for="sexe" class="ml-3">Sexe :</label>
<div class="form-group ml-4 ">
  <label for="" class="font-weight-bold"> Femme </label>
        <input type="radio" class="mr-4" name="patient[sexe]" value="Femme" <?php if ($patient->sexe == "Femme") {echo "checked";        } ?>>
  <label for="" class="font-weight-bold "> Homme </label>
       <input type="radio" name="patient[sexe]" value="Homme" <?php if ($patient->sexe == "Homme") {echo "checked";       } ?>>
</div>
</div>

</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="">Email :</label>
    <input type="email" name="patient[email]" class="form-control" value="<?php echo  h($patient->email);  ?>"  placeholder="Email">
  </div>
  <div class="form-group col-md-6">
    <label for="">Password :</label>
    <input type="password" name="patient[pass]" class="form-control" value="<?php echo  h($patient->pass);  ?>"   placeholder="Password">
  </div>
</div>
</div>
