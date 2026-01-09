<?php
/*
Template Name: what we do
*/
get_header();
?>
<main>
   <section class ="section">
    <div class="container">
      <div class="inner-container">
       
       <div class="what-we-do__wrap">
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
]); ?>
<?php if ( $categories ) : ?>
    <ul class="what-we-do__category__category__list">
        <?php foreach ( $categories as $category ) : ?>
            <li class="what-we-do__category__category__list__item">
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                    <?php echo esc_html( $category->name ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
        </div>

      </div>
    </div>
   </section>
</main>
<?php get_footer(); ?>