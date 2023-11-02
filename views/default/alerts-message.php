<?php if ($_SESSION["custom_message"]) { ?>
    <div class="alert alert-<?= $_SESSION["custom_message"]['type'] ?>">
        <?= $_SESSION["custom_message"]['message'] ?>
    </div>
<?php } ?>