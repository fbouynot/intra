<div class="center">    
    <form method="post" action="<?php echo BASE_URL . '/cv';?>" enctype="multipart/form-data">

        <label for="cv">Votre CV</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">

        <input type="file" name="cv" />
        <button type="submit" name="submit">Envoyer</button>

    </form>
</div>