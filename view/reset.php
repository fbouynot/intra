<!-- Formulaire de réinitialisation de mot de passe -->
<form method="post" action="<?php echo BASE_URL;?>/reset" enctype="multipart/form-data">

    <fieldset>

        <label for="mailRecup">Adresse email</label>
        <input id="mailRecup" name="mailRecup" type="email">

        <input type="submit" value="Envoyer">

    </fieldset>
    
</form>