<?php

get_header();
?>

<main id="primary" class="site-main">
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
<section class="section">
  <div class="container">
    <div class="inner-container single__sample">
<?php $image=get_field('sample_image'); ?>
<img class="single__sample__image" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']?>"  />

 <div class="single__sample__container">
       <div class="single__sample__wrap__content">
        <div class="single__sample__wrap">
           <?php
          $categories = get_the_terms( get_the_ID(), 'samples-categories' );

          if ( $categories && ! is_wp_error( $categories ) ) :
              $cat_links = [];

              foreach ( $categories as $category ) {
                  $cat_links[] = '<a class="single__sample__wrap__link" href="' . esc_url( get_term_link( $category ) ) . '">' . esc_html( $category->name ) . '</a>';
              }
              echo implode($cat_links );
          endif;
        ?>
       </div>
        <h2 class="single__sample__wrap__content__title"><?php the_title(); ?></h2>
        </div>
       <?php $sample_description = get_field('sample_description');
       $sample_description_title = get_field('sample_description_title');
       if($sample_description): ?>
       <div class="single__sample__container__description">
        <h3 class="single__sample__container__description__title"><?php echo esc_html($sample_description_title); ?></h3>
         <p class="single__sample__container__description__text"><?php echo esc_html($sample_description); ?></p>
       </div>
        <?php endif ?>
        <?php $quote_button_text = get_field("quote_button_text" ,'option');
        $quote_button_link = get_field("quote_button_link" ,'option');
        if ($quote_button_text && $quote_button_link):?>
        <a class="button" href="<?php echo esc_url($quote_button_link['url']); ?>"><?php echo esc_html($quote_button_text); ?></a>
        <?php endif ?>
        
     </div>
    </div>
  </div>
</section>

</main>

<?php
get_sidebar();
get_footer();
