<div class="d_box">
    <h2>Mes informations</h2>
    <div class="d_box_row">
        <div class="field-name">Addresse mail</div>
            <div class="field-label">
                <?php echo $_SESSION['userMail'];?>
            </div>
            <div class="field-edit">
                <a href="#">Editer</a>
            </div>
    </div>
    <div class="d_box_row">
        <div class="field-name">Mot de passe</div>
        <div class="field-label">*******</div>
        <div class="field-edit">
            <a href="#">Editer</a>
        </div>
    </div>
    <div class="d_box_row">
        <div class="field-name">Téléphone</div>
        <div class="field-label">
            <?php echo $_SESSION['userPhone'];?>
        </div>
        <div class="field-edit">
            <a href="#">Editer</a>
        </div>
    </div>
    <div class="d_box_row">
        <div class="field-name">Addresse postale</div>
        <div class="field-label">
            
        </div>
        <div class="field-edit">
            <a href="#">Editer</a>
        </div>
    </div>
</div>

<form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="userPhone">Numéro de téléphone</label></td>
            <td><input id="userPhone" name="userPhone"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Modifier</button></td>
            <td></td>
        </tr>
    </table>
</form>   
</form>