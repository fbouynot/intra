<!-- Formulaire de changement d'adresse mail -->
<form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">
    <fieldset>

        <label for="userMail">Mail</label>
        <input id="userMail" name="userMail" type="text" value=<?php echo $mail;?>>

        <input type="submit" value="Envoyer">
        
    </fieldset>
</form>
  
<!-- Formulaire de changement de mot de passe -->
<form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">

    <fieldset>

        <label for="userPwd">Ancien mot de passe</label>
        <input id="userPwd" name="userPwd" type="password">

        <label for="newPwd">Nouveau mot de passe</label>
        <input id="newPwd" name="newPwd" type="password">

        <label for="userPwd">Vérification du nouveau mot de passe</label>
        <input id="userPwd" name="verifPwd" type="password">

        <input type="submit" value="Changer">

    </fieldset>
</form>