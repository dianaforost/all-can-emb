<?php
/*
Template Name: what we do
*/
get_header();
?>
<main>
   <section class ="section what-we-do">
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
       
 <?php
            $all_cat_id = get_cat_ID('All');
            $all_category_image = get_field('category_image', 'category_' . $all_cat_id);
            ?>
            <li class="what-we-do__category__list__item">
                <a class="what-we-do__category__list__item__link__wrap" href="<?php echo esc_url( get_category_link( $all_cat_id ) ); ?>">
                    <?php if ( $all_category_image && isset($all_category_image['url']) ) : ?>
                        <img class="what-we-do__category__list__item__image"
                             src="<?php echo esc_url( $all_category_image['url'] ); ?>"
                             alt="All">
                        <div class="what-we-do__category__list__item__image__wrap"></div>
                    <?php endif; ?>
                    <div class="what-we-do__category__list__item__link">
                        <p><?php echo esc_html('All'); ?></p>
                    </div>
                </a>
            </li>


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