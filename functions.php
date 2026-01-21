<?php
if ( ! function_exists( 'ace_theme_setup' ) ) {
    function ace_theme_setup() {
        add_theme_support( 'custom-logo', [
            'height'      => 64,
            'width'       => 64,
            'flex-height' => true,
            'flex-width'  => true,
        ] );

        add_theme_support( 'title-tag' );

    }

    add_action( 'after_setup_theme', 'ace_theme_setup' );
}


if ( ! function_exists( 'ace_enqueue_assets' ) ) {

    function ace_enqueue_assets() {

        wp_enqueue_style( 'ace-main', get_stylesheet_uri() );
        wp_enqueue_style(
            'ace-style',
            get_template_directory_uri() . '/assets/styles/main.css',
            [ 'ace-main' ]
        );

        wp_enqueue_style(
            'normalize',
            'https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/2.0.0/modern-normalize.min.css'
        );

        wp_enqueue_script(
            'ace-scripts',
            get_template_directory_uri() . '/assets/scripts/main.js',
            [],
            null,
            true
        );

        if ( is_page_template( 'templates/home.php' ) ) {
            wp_enqueue_style( 'ace-home-style', get_template_directory_uri() . '/assets/styles/template-styles/home.css', [ 'ace-main' ] );
            wp_enqueue_script( 'ace-home-script', get_template_directory_uri() . '/assets/scripts/template-scripts/home.js', [], null, true );
        }

        if ( is_page_template( 'templates/about.php' ) ) {
            wp_enqueue_style( 'ace-about-style', get_template_directory_uri() . '/assets/styles/template-styles/about.css', [ 'ace-main' ] );
            wp_enqueue_script( 'ace-about-script', get_template_directory_uri() . '/assets/scripts/template-scripts/about.js', [], null, true );
        }

        if ( is_page_template( 'templates/contacts.php' ) ) {
            wp_enqueue_style( 'ace-contacts-style', get_template_directory_uri() . '/assets/styles/template-styles/contacts.css', [ 'ace-main' ] );
            wp_enqueue_script( 'ace-contacts-script', get_template_directory_uri() . '/assets/scripts/template-scripts/contacts.js', [], null, true );
        }

        if ( is_page_template( 'templates/what-we-do.php' ) ) {
            wp_enqueue_style( 'ace-what-we-do-style', get_template_directory_uri() . '/assets/styles/template-styles/what-we-do.css', [ 'ace-main' ] );
            wp_enqueue_script( 'ace-what-we-do-script', get_template_directory_uri() . '/assets/scripts/template-scripts/what-we-do.js', [], null, true );
        }
        if ( is_page_template( 'templates/news.php' ) ) {
            wp_enqueue_style( 'ace-news-style', get_template_directory_uri() . '/assets/styles/template-styles/news.css', [ 'ace-main' ] );
        }

        if (is_singular() && locate_template('template-parts/work-with-us.php')) {
    wp_enqueue_style('work-with-us-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/work-with-us.css', array('main'));
    wp_enqueue_script('work-with-us-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/work-with-us.js', array(), false, true);
  }

  if (is_singular() && locate_template('template-parts/one-sample.php')) {
    wp_enqueue_style('one-sample-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-sample.css', array('main'));
  }

  if (is_singular() && locate_template('template-parts/one-category.php')) {
    wp_enqueue_style('one-category-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-category.css', array('main'));
  }

    }

    add_action( 'wp_enqueue_scripts', 'ace_enqueue_assets' );
}


if ( ! function_exists( 'ace_add_google_fonts' ) ) {

    function ace_add_google_fonts() {
        wp_enqueue_style(
            'ace-google-fonts',
            'https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&family=Open+Sans&family=Roboto&display=swap',
            [],
            null
        );
    }

    add_action( 'wp_enqueue_scripts', 'ace_add_google_fonts' );
}

if ( ! function_exists( 'ace_register_menus' ) ) {

    function ace_register_menus() {
        register_nav_menus( [
            'header' => __( 'Header Menu', 'ace' ),
            'footer' => __( 'Footer Menu', 'ace' ),
        ] );
    }

    add_action( 'init', 'ace_register_menus' );
}

if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page( [
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ] );
    acf_add_options_sub_page([
        'page_title' => 'Samples Settings',
        'menu_title' => 'Samples Settings',
        'menu_slug'  => 'samples-settings',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-general-settings',
    ]);

    acf_add_options_sub_page( [
        'page_title'  => 'Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'theme-general-settings',
    ] );

    acf_add_options_sub_page( [
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ] );

}