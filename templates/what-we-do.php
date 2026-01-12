<?php
/*
Template Name: what we do
*/
get_header();
?>
<main>
   <section class ="section">
    <div class="container">
      <div class="inner-container what-we-do__wrap">
       
       <div class="what-we-do__wrap__content">
          <?php 
$what_title = get_field('what_title');
$what_text = get_field('what_text');
if ( $what_title && $what_text ) :
?>
<h2 class="what-we-do__wrap__title"><?php echo esc_html( $what_title ); ?></h2>
    <p class=""> <?php echo esc_html( $what_text ); ?></p>
<?php endif; ?>
        </div>


        <div class="what-we-do__category">
          <?php
$categories = get_categories([
    'hide_empty' => false,
    'exclude'    => [1],
]); ?>
<?php if ( $categories ) : ?>
    <ul class="what-we-do__category__list">
        <?php foreach ( $categories as $category ) : ?>
            <?php
        get_template_part(
            'template-parts/one-category',
            null,
            [ 'category' => $category ]
        );
    ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('/template-parts/one-product'); ?>
  
</main>
<?php get_footer(); ?>