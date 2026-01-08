<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <?php wp_head(); ?>
    <title>All Canadian Emblem Corporation</title>
</head>
<body>  
     <header class="header">
        <div class="container">
            <div class="header__content">
               <div class="header__content__logo">
              <a href="<?php echo home_url('/'); ?>">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/images/leaficon.png" alt="Leaf icon">
</a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">All Canadian Emblem</a>
            </div>
            <?php
wp_nav_menu([
  'theme_location' => 'header',
  'container'      => false,
  'menu_class'     => 'header__page-list',
]);
?>
            </div>
        </div>
    </header>
	