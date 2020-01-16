<?php
/**
 * Plugin Name: WP Head to Foot Scripts
 * Description: Add your favorite header and footer scripts from, Google Analytics, CSS, Javascript, Bootstrap, JQuery, Tracking Codes, etc.
 * Plugin URI:  https://www.pinoyitsolution.com
 * Version:     1.0.0
 * Author:      Ronknight
 **/

/**
 * Admin Menu
 */

    function wpscript_admin_menu_option()
    {
        add_menu_page('WP Head to Foot Scripts', 'WP-Script', 'manage_options', 'wpscript-admin-menu', 'wpscript_scripts_page', 'dashicons-media-code', 200);
    }
    add_action('admin_menu','wpscript_admin_menu_option');

/**
 * Admin Page
 */    

    function wpscript_scripts_page()
    {

        if(array_key_exists('submit_scripts_update', $_POST))
        {
            update_option('wpscript_header_scripts', $_POST['header_scripts']);
            update_option('wpscript_footer_scripts', $_POST['footer_scripts']);
 
            ?>
            <div id="setting-error-settings-updated" class="updated_settings_error notice is-dismissible"><strong>Settings has been saved.</strong></div>
            <?php
        }

        $header_scripts = get_option('wpscript_header_scripts', '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- wpscript -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-5879677453282695"
             data-ad-slot="3033969011"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>');
        $footer_scripts = get_option('wpscript_footer_scripts', '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- wpscript -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-5879677453282695"
             data-ad-slot="3033969011"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>');
        

        ?>
        <div class="wrap">
            <h2>Update Scripts</h2>
            <form method="post" action="">
            <label for="header_scripts">Header Scripts</label>
            <textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>
            <label for="footer_scripts">Footer Scripts</label>
            <textarea name="footer_scripts" class="large-text"><?php print $footer_scripts; ?></textarea>
            <input type="submit" name="submit_scripts_update" class="button button-primary"value="UPDATE SCRIPTS">

        </div>
        <?php
    }

    /**
     * Add Header and Footer Scripts on all pages.
     */
    function wpscript_display_header_scripts()
    {
        $header_scripts = get_option('wpscript_header_scripts', 'none');
        print $header_scripts;
    }
    add_action('wp_head', 'wpscript_display_header_scripts');

    function wpscript_display_footer_scripts()
    {
        $header_scripts = get_option('wpscript_footer_scripts', 'none');
        print $header_scripts;
    }
    add_action('wp_footer', 'wpscript_display_footer_scripts');