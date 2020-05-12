<?php

  // Mandatory styles and scripts
  function mandatory_scripts() {
    wp_enqueue_style( 'Bootstrap', get_template_directory_uri(  ) . '/css/bootstrap.min.css', array(), '4.4.1' );
    wp_enqueue_style( 'Blog', get_template_directory_uri(  ) . '/css/blog.css' );
    wp_enqueue_script( 'Bootstrap', get_template_directory_uri(  ) . '/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.4.1', true );
  }

  add_action( 'wp_enqueue_scripts', 'mandatory_scripts' );

  // Google fonts
  function link_google_fonts() {
    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
  }

  add_action( 'wp_print_styles', 'link_google_fonts' );

  // WordPress Titles
  add_theme_support( 'title-tag' );

  // Create Custom Global Settings
  function igorsky_settings_page() {
    ?>
      <div class="wrap">
        <h1>Igorsky Options</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("social-settings");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
      </div>
    <?php
  }

  function add_theme_menu_item() {
    add_menu_page("Igorsky Options", "Igorsky Options", "manage_options", "igorsky-options", "igorsky_settings_page", null, 99);
  }

  add_action("admin_menu", "add_theme_menu_item");

  // Social Media Links
  function setting_twitter() {  ?>
      <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
  <?php }
  function setting_github() { ?>
    <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
  <?php }
  function setting_facebook() { ?>
    <input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
  <?php }

  function custom_settings_page_setup() {
    add_settings_section( 'social-settings', 'Social Settings', null, 'theme-options' );
    add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'social-settings' );
    add_settings_field( 'github', 'Github URL', 'setting_github', 'theme-options', 'social-settings' );
    add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'social-settings' );
  
    register_setting('social-settings', 'twitter');
    register_setting('social-settings', 'github');
    register_setting('social-settings', 'facebook');
  }
  
  add_action( 'admin_init', 'custom_settings_page_setup' );