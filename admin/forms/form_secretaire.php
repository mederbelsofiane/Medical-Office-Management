<div class="font-weight-bold">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="">Nom De la secretaire :</label>
  <input type="text" name="secretaire[nom_secretaire]" class="form-control" value="<?php echo  h($secretaire->nom_secretaire);  ?>" placeholder="Nom">
</div>
<div class="form-group col-md-6">
<label for="">Prenom de la secretaire :</label>
<input type="text" name="secretaire[prenom_secretaire]" class="form-control" value="<?php echo  h($secretaire->prenom_secretaire);  ?>" placeholder="Prenom">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="">Username :</label>
<input type="text" name="secretaire[username]" class="form-control" value="<?php echo  h($secretaire->username);  ?>" placeholder="username">
</div>
<div class="form-group col-md-6">
<label for="date_de_naissance">Date de naissance :</label>
<input type="date" name="secretaire[date_de_naissance]" class="form-control" value="<?php echo  h($secretaire->date_de_naissance);  ?>" placeholder="Nom">
</div>

</div>

<div class="form-row">
  <div class="form-group col-md-6">
  <label for="telephone">Numero de telephone :</label>
  <input type="text" name="secretaire[telephone]" class="form-control" value="<?php echo  h($secretaire->telephone);  ?>" placeholder="...">
  </div>
<div class="form-group col-md-6">
<label for="sexe" class="ml-3 mt-2">Sexe:</label>
<div class="form-group col-md-12 ml-4  ">

  <label for="" class="font-weight-bold "> Femme </label>
        <input type="radio" class="mr-4" name="secretaire[sexe]" value="Femme" <?php if(($secretaire->sexe)== "Femme" ) {echo "checked";  } ?>>
  <label for="" class="font-weight-bold "> Homme </label>
       <input type="radio" name="secretaire[sexe]" value="Homme" <?php if(($secretaire->sexe)== "Homme" ) {echo "checked";  } ?>>
</div>
</div>

</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="">Email :</label>
    <input type="email" name="secretaire[email]" class="form-control" value="<?php echo  h($secretaire->email);  ?>" placeholder="Email">
  </div>
  <div class="form-group col-md-6 ">
    <label for="">Selectioné votre photo :</label><br>
    <input type="file" name="secretaire[image]" >
  </div>


</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="">Password :</label>
    <input type="password" name="secretaire[password]" class="form-control"  placeholder="">
  </div>
  <div class="form-group col-md-6">
    <label for="">Confirm Password :</label>
    <input type="password" name="secretaire[confirm_password]" class="form-control"  placeholder="">
  </div>

</div>
</div>
