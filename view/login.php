<form method="post" action="<?php echo BASE_URL;?>/login" enctype="multipart/form-data">';
    <fieldset>
        <label for="userName">Nom d'utilisateur</label>
        <input id="userName" name="userName">

        <label for="userPwd">Mot de passe</label>
        <input id="userPwd" name="userPwd" type="password">

        <input type="submit" value="Se connecter">
    </fieldset>
</form>