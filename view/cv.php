<?php

if (isset($_FILES['cv']) == true && $_FILES['cv'] != "")
{
    ?>
<div class="center">
    <?php echo $message;?>
</div>
<?php
}
else
{
    ?>
<div class="center">
    <div class="wrapper">
        <form method="post" action="<?php echo BASE_URL . '/cv';?>" enctype="multipart/form-data">
            <h3>Votre CV</h3>
            <label class="custom-input" for="input-file">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <input id="input-file" type="file" name="cv" />
                <div class="button-input-file">Parcourir</div>
            </label>    
            <button class="button-apply" type="submit" name="submit">Envoyer</button>
        </form>
    </div>    
</div>
<?php
}