<?php     
    echo '<form method="post" action="' . BASE_URL . '/profile" enctype="multipart/form-data">';
?>
        <fieldset>

            <label for="userMail">Mail</label>
            <?php
                echo '<input id="userMail" name="userMail" type="text" value=' . $mail . '>';
            ?>
            
            
            <input type="submit" value="Envoyer">
            
        </fieldset>
    </form>
    <?php     
        echo '<form method="post" action="' . BASE_URL . '/profile" enctype="multipart/form-data">';
    ?>
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