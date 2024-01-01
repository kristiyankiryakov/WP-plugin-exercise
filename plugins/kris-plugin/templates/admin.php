<div class="wrap">
    <h1> Kris Plugin template</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('kris_options_group');
        do_settings_sections('kris_plugin');
        submit_button();
        ?>
    </form>
</div>