<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <?php wp_head(); ?>
    <title></title>
</head>
<body>  
     <header class="header">
        <div class="container">
            <div class="header__content">
               <div class="header__content__wrap">
                 <?php
          if ( has_custom_logo() ) {
            the_custom_logo();
          } else {
            ?>
        <a class="header__content_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
            <?php
          }
          ?>
            </div>

           <div class="header__content__container">
            <div class="header__content__container__burger">
              <div class="header__content__container__burger__close-button">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/cross.svg" />
              </div>
               <?php
                wp_nav_menu([
                  'theme_location' => 'header',
                  'container'      => false,
                  'menu_class'     => 'header__content__list',
                ]);
                ?>
            </div>
           </div>

          <div class="burger">
            <span></span>
          </div>
            </div>
        </div>
    </header>
	