<footer class="footer">
    <div class="container">
      <div class="inner-container">
<div class="footer__content">


        <div class="footer__content__wrap">
              <?php
          if ( has_custom_logo() ) {
            the_custom_logo();
          } else {
            ?>
        <a class="footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
            <?php
          }
          ?>
<?php if ( get_field( 'footer_company_description', 'option' ) ) : ?>
    <p class="footer__text">
        <?php echo esc_html( get_field( 'footer_company_description', 'option' ) ); ?>
</p>
<?php endif; ?>
          </div>


        <div class="footer__content__wrap">
           <h3 class="footer__content__title"><?php the_field( 'footer_title_1', 'option' ); ?></h3>
              <?php $menu = wp_nav_menu( [
                                'theme_location' => 'footer',
    'container'      => false,
    'menu_class'     => 'menu-list',
    'menu_id'        => 'menu-footer-menu',
    'echo'           => false,
                            ] );
                    if($menu) : ?>

                            <?php echo $menu ?>	

                    <?php endif; ?>   
        </div>



        <div class="footer__content__wrap">
           <h3 class="footer__content__title"><?php the_field( 'footer_title_2', 'option' ); ?></h3>
<?php 
$categories = get_categories([
    'hide_empty' => false,
    'exclude'    => [1]
]);

if ( $categories ) :
?>
<ul class="menu-list">
    <?php foreach ( $categories as $category ) :  
        $link = get_category_link( $category->term_id );
    ?>
        <li class="menu-item">
            <a href="<?php echo esc_url( $link ); ?>">
                <?php echo esc_html( $category->name ); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
        </div>


        <div class="footer__content__wrap">
             <h3 class="footer__content__title"><?php the_field( 'footer_title_3', 'option' ); ?></h3>
             <ul class="menu-list">
              <li class="menu-item"><a tel="<?php the_field( 'footer_phone_number', 'option' ); ?>"><?php the_field( 'footer_phone_number', 'option' ); ?></a></li>
              <li class="menu-item"><a href="<?php the_field( 'footer_address_link', 'option' ); ?>"><?php the_field( 'footer_address', 'option' ); ?></a></li>
             </ul>
        
        </div>
</div>

<div class="footer__rights">
  <p><?php the_field('footer_rights', 'option') ?></p>
</div>

      </div>
    </div>
</footer>
<?php wp_footer(); ?>  
</body>
</html>
