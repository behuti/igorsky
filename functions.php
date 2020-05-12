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