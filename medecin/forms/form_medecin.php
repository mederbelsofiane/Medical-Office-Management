<!-- <div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_medecin">Nom Du medecin :</label>
  <input type="text" name="medecin[nom_medecin]" class="form-control" placeholder="Nom">
</div>
<div class="form-group col-md-6">
<label for="prenom_medecin">Prenom du medecin :</label>
<input type="text" name="medecin[prenom_medecin]" class="form-control" placeholder="Prenom">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="">Specialite du medecin :</label>
<input type="text" name="medecin[specialite]" class="form-control" placeholder="Specialite">
</div>
<div class="form-group col-md-6">
<label for="date_de_naissance">Date de naissance :</label>
<input type="date" name="medecin[date_de_naissance]" class="form-control" placeholder="Nom">
</div>

</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="telephone">Numero de telephone :</label>
<input type="text" name="medecin[telephone]" class="form-control" placeholder="...">
</div>
<div class="form-group col-md-6">
<label for="sexe" class="ml-3">Sexe :</label>
<div class="form-group ml-4 ">
  <label for="" class="font-weight-bold"> Femme </label>
        <input type="radio" class="mr-4" name="medecin[sexe]" value="Femme">
  <label for="" class="font-weight-bold "> Homme </label>
       <input type="radio" name="medecin[sexe]" value="Homme">
</div>
</div>

</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="">Email :</label>
    <input type="email" name="medecin[email]" class="form-control" placeholder="Email">
  </div>
  <div class="form-group col-md-6">
    <label for="">Password :</label>
    <input type="password" name="medecin[pass]" class="form-control"  placeholder="Password">
  </div>
</div>
<div class="form-row">
<div class="form-group m-2 mb-3 col-md-6 p-3 border border-secondary rounded">
  <label for="">Selectioné votre photo :</label><br>
  <input type="file" name="medecin[image]" >

</div>
</div>
</div> -->
<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="nom_medecin">Nom Du medecin :</label>
  <input type="text" name="medecin[nom_medecin]" class="form-control" value="<?php echo $medecin->nom_medecin; ?>" placeholder="Nom">
</div>
<div class="form-group col-md-6">
<label for="prenom_medecin">Prenom du medecin :</label>
<input type="text" name="medecin[prenom_medecin]" class="form-control" value="<?php echo $medecin->prenom_medecin; ?>" placeholder="Prenom">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="">Specialite du medecin :</label>
<input type="text" name="medecin[specialite]" class="form-control" value="<?php echo $medecin->specialite; ?>" placeholder="Specialite">
</div>
<div class="form-group col-md-6">
<label for="date_de_naissance">Date de naissance :</label>
<input type="date" name="medecin[date_de_naissance]" class="form-control" value="<?php echo $medecin->date_de_naissance; ?>" placeholder="Nom">
</div>

</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="telephone">Numero de telephone :</label>
<input type="text" name="medecin[telephone]" class="form-control" value="<?php echo $medecin->telephone; ?>" placeholder="...">
</div>
<div class="form-group col-md-6">
<label for="sexe" class="ml-3">Sexe :</label>
<div class="form-group ml-4 ">
  <label for="" class="font-weight-bold"> Femme </label>
        <input type="radio" class="mr-4" name="medecin[sexe]" value="Femme" <?php if ($medecin->sexe == "Femme") {echo "checked";        }   ?>>
  <label for="" class="font-weight-bold "> Homme </label>
       <input type="radio" name="medecin[sexe]" value="Homme" <?php if ($medecin->sexe=="Homme") {echo "checked";       } ?>>
</div>
</div>

</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="">Email :</label>
    <input type="email" name="medecin[email]" class="form-control" value="<?php echo $medecin->email; ?>"  placeholder="Email">
  </div>
  <div class="form-group col-md-6">
    <label for="">Password :</label>
    <input type="password" name="medecin[pass]" class="form-control" value="<?php echo $medecin->pass; ?>"  placeholder="Password">
  </div>
</div>
<div class="form-row">
<div class="form-group m-2 mb-3 col-md-6 p-3 border border-secondary rounded">
  <label for="">Selectioné votre photo :</label><br>
  <input type="file" name="fileToUpload">

</div>
</div>
</div>
