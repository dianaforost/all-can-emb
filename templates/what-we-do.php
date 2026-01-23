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
    <p class="what-we-do__wrap__text"> <?php echo esc_html( $what_text ); ?></p>
<?php endif; ?>
        </div>

         <div class="what-we-do__category">
        <?php
        $categories = get_terms([
          'taxonomy'   => 'samples-categories',
          'hide_empty' => false,
        ]);
        ?>

        <?php if ( ! empty($categories) && ! is_wp_error($categories) ) : ?>
              <ul class="what-we-do__category__list">
                
<?php
$page_slug = 'what-we-do/all';

$all_page = get_page_by_path( $page_slug );

if ( $all_page ) :
    $all_page_link  = get_permalink( $all_page->ID );
    $all_page_title = get_the_title( $all_page->ID );
    $all_page_image = get_field( 'category_image', $all_page->ID ); 
?>
<li class="what-we-do__category__list__item">
    <a class="what-we-do__category__list__item__link__wrap" 
       href="<?php echo esc_url( $all_page_link ); ?>">

        <?php if ( $all_page_image && isset($all_page_image['url']) ) : ?>
            <img class="what-we-do__category__list__item__image"
                 src="<?php echo esc_url( $all_page_image['url'] ); ?>"
                 alt="<?php echo esc_attr( $all_page_title ); ?>">
            <div class="what-we-do__category__list__item__image__wrap"></div>
        <?php else: ?>
            <div class="what-we-do__category__list__item__image__wrap"></div>
        <?php endif; ?>

        <div class="what-we-do__category__list__item__link">
            <p><?php echo esc_html( $all_page_title ); ?></p>
        </div>

    </a>
</li>
<?php endif; ?>


              
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
          <?php else :?>
          
 <?php
$no_categories_text        = get_field('no_categories_text', 'option');
$no_categories_button_text = get_field('no_categories_button_text', 'option');
$no_categories_button      = get_field('no_categories_button', 'option');

if ( $no_categories_text ) :
?>
 <div class="no-items">
   <img class="no-items__image" src="<?php echo get_template_directory_uri()?>/assets/images/no-data.png" />
  <p class="no-items__title"><?php echo esc_html( $no_categories_text ); ?></p>

  <?php if ( $no_categories_button && $no_categories_button_text ) : ?>
    <a class="button" href="<?php echo esc_url( $no_categories_button['url'] ); ?>" class="btn">
      <?php echo esc_html( $no_categories_button_text ); ?>
    </a>
  <?php endif; ?>
 </div>

<?php endif; ?>

        <?php endif; ?>
      </div>
      </div>
    </div>
  </section>

  <?php get_template_part('/template-parts/one-product'); ?>
  
</main>
<?php get_footer(); ?>