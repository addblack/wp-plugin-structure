<div class="wrap">
    <h1>AlexDen Plugin test</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('alexden_options_group');
            do_settings_sections('alexdenplugin');
            submit_button();
        ?>
    </form>
</div>
