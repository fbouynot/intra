<!-- Formulaire de connexion -->
<h3>Se connecter</h3>
<div class="login">
    <form method="post" action="<?php echo BASE_URL;?>/login" enctype="multipart/form-data">
            <label for="userName">Nom d'utilisateur</label>
            <input id="userName" name="userName">

            <label for="userPwd">Mot de passe</label>
            <input id="userPwd" name="userPwd" type="password">

            <!--<input type="submit" value="Se connecter">-->
            <button type="submit">Se connecter</button>
    </form>    
<a href="#" >Identifiants oubliés ?</a>
</div>