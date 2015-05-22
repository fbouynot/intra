<div class="center">
    <div class="wrapper">
        <form method="post" action="<?php echo BASE_URL . '/cv';?>" enctype="multipart/form-data">
            <label for="cv"><h3>Votre CV</h3></label>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
            <button id="button-input-file">
                <input id="input-file" type="file" name="cv" />
            </button>
            <button class="button-apply" type="submit" name="submit">Envoyer</button>
        </form>
    </div>    
</div>