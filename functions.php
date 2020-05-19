<?php

  // Mandatory styles and scripts
  function mandatory_scripts() {
    // styles
    wp_register_style( 'Bootstrap', get_template_directory_uri(  ) . '/css/bootstrap.min.css', array(), '4.4.1' );
    wp_enqueue_style( 'Bootstrap' );

    wp_register_style( 'Main', get_template_directory_uri(  ) . '/css/main.css' );
    wp_enqueue_style( 'Main' );
    // scripts
    wp_register_script( 'Bootstrap', get_template_directory_uri(  ) . '/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.4.1', true );
    wp_enqueue_script( 'Bootstrap' );
  }

  add_action( 'wp_enqueue_scripts', 'mandatory_scripts' );

  // Link Google fonts
  function link_google_fonts() {
    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
  }

  add_action( 'wp_print_styles', 'link_google_fonts' );

  // Theme Options

  // WordPress Titles
  add_theme_support( 'title-tag' );

  // Menus Support
  add_theme_support( 'menus' );
  add_theme_support( 'post-thumbnails' );


  // Menus

  register_nav_menus( 
    array(
      'top-menu' => 'Top Menu Location',
      'mobile-menu' => 'Mobile Menu Location',
      'gooter-menu' => 'Footer Menu Location',
    )
  );

  // Custom Image Sizes

  add_image_size( 'blog-large', 800, 600, false );
  add_image_size( 'blog-small', 300, 200, true );

  //Add Bootstrap class to next_posts and previous_posts
  function posts_link_attributes() {
    return 'class="page-link"';
  }

  add_filter('next_posts_link_attributes', 'posts_link_attributes');
  add_filter('previous_posts_link_attributes', 'posts_link_attributes');

  // WpBakery Page Builder Activation
  vc_set_as_theme();


// WpBakery Page Builder Addons
  // Barfiller
  add_shortcode( 'ig-barfiller', 'ig_barfiller_callback' );
  add_action( 'wp_enqueue_scripts', 'barfiller_scripts' );

  function barfiller_scripts() {
    wp_enqueue_style( 'Barfiller', get_template_directory_uri() . '/third-party-plugins/barfiller/barfiller.css' );
    wp_enqueue_script( 'Barfiller', get_template_directory_uri() . '/third-party-plugins/barfiller/barfiller.js', array('jquery'), false, true );
    wp_enqueue_script( 'BarfillerInstance', get_template_directory_uri() . '/third-party-plugins/barfiller/plugin.js', array('jquery', 'Barfiller'), false, true );
  }

  function ig_barfiller_callback($atts) {
    $atts = shortcode_atts( array(

      'title'=> 'undefined',
      'color'=> '#000',
      'duration'=> 500,
      'tooltip'=> false,
      'percent'=> 50

    ), $atts );

    ob_start();

    ?>

    <div class="barfill-container" data-options='{"barColor":"<?php echo $atts['color'];?>","duration":"<?php echo $atts['duration'];?>","tooltip":"<?php echo $atts['tooltip'];?>"}'>
      <h3><?php echo $atts["title"];?></h3>
      <div id="bar" class="barfiller">
        <div class="tipWrap">
          <span class="tip"></span>
        </div>
        <span class="fill" data-percentage="<?php echo $atts['percent'];?>"></span>
      </div>
    </div>
    <?php
    $output = ob_get_clean();
    return $output;
  }
