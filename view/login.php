<!-- Formulaire de connexion -->
<div class="login">
<h2>Se connecter</h2>
<form method="post" action="<?php echo BASE_URL;?>/login" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="userName">Nom d'utilisateur</label></td>
            <td><input id="userName" name="userName"></td>
        </tr>
        <tr>
            <td><label for="userPwd">Mot de passe</label></td>
            <td><input id="userPwd" name="userPwd" type="password"></td>
            <td id="forgotten_id"><a href="#" >Identifiants oubliés ?</a></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Se connecter</button></td>
            <td></td>
        </tr>
    </table>
</form>      
</div>