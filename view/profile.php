<div class="d_box">
    <h2>Mes informations</h2>
    <div class="d_box_row">
        <div class="field-name">Addresse mail</div>
            <div class="field-label">
                <?php echo $_SESSION['userMail'];?>
            </div>
            <div class="field-edit">
                <a href="#email">Editer</a>
            </div>
    </div>
    <div class="d_box_row">
        <div class="field-name">Mot de passe</div>
        <div class="field-label">*******</div>
        <div class="field-edit">
            <a href="#pwd">Editer</a>
        </div>
    </div>
    <div class="d_box_row">
        <div class="field-name">Téléphone</div>
        <div class="field-label">
            <?php echo $_SESSION['userPhone'];?>
        </div>
        <div class="field-edit">
            <a href="#phone">Editer</a>
        </div>
    </div>
    <div class="d_box_row">
        <div class="field-name">Addresse postale</div>
        <div class="field-label">
            <?php echo $_SESSION['userAddress'];?>
        </div>
        <div class="field-edit">
            <a href="#address">Editer</a>
        </div>
    </div>
</div>

<!--Edition-->

<!--Email-->
<div id="email" class="edition">
    <div>
        <form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">
            <label for="userMail">Adresse mail</label>
            <input id="userMail" name="userMail">
            <button type="submit">Appliquer</button>
            <a href="#"><button>Annuler</button></a>
        </form>
    </div>
</div>

<!--Pwd-->
<div id="pwd" class="edition">
    <div>
        <form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">
            <label for="userPwd">Mot de passe actuel</label>
            <input id="userPwd" name="userPwd">
            <label for="newPwd">Nouveau mot de passe</label>
            <input id="newPwd" name="newPwd">
            <label for="verifPwd">Confirmation du mot de passe</label>
            <input id="verifPwd" name="verifPwd">
            <button type="submit">Appliquer</button>
            <a href="#"><button>Annuler</button></a>
        </form>
    </div>
</div>

<!--Phone-->
<div id="phone" class="edition">
    <div>
        <form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">
            <label for="userPhone">Téléphone</label>
            <input id="userPhone" name="userPhone">
            <button type="submit">Appliquer</button>
            <a href="#"><button>Annuler</button></a>
        </form>
    </div>
</div>

<!--Address-->
<div id="address" class="edition">
    <div>
        <form method="post" action="<?php echo BASE_URL;?>/profile" enctype="multipart/form-data">
            <label for="userAddress">Adresse</label>
            <input id="userAddress" name="userAddress">
            <button type="submit">Appliquer</button>
            <a href="#"><button>Annuler</button></a>
        </form>
    </div>
</div>