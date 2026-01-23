<?php

get_header();
?>

<main id="primary" class="site-main">
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
<section class="section">
  <div class="container">
    <div class="inner-container single__sample">
<?php $sample_image=get_field('sample_image');
$sample_title=get_field('sample_title'); ?>
<img class="single__sample__image" src="<?php echo $sample_image['url'] ?>" alt="<?php echo $sample_image['alt']?>"  />

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
<h2 class="single__sample__wrap__content__title"><?php echo esc_html($sample_title); ?></h2>
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

<section class="section">
  <div class="container">
    <div class="inner-container">
      <?php $you_might_like_title= get_field('you_might_like_title', 'option'); 
      if($you_might_like_title):?>
      <h3 class="you-might-like__title"><?php echo esc_html($you_might_like_title); ?></h3>
      <?php endif ?>

     <?php
        $terms = get_the_terms( get_the_ID(), 'samples-categories' );

        if ( $terms && ! is_wp_error( $terms ) ) :
            $term_ids = [];
            foreach ( $terms as $term ) {
                    $term_ids[] = $term->term_id;
            }

            if ( ! empty( $term_ids ) ) :
                $args = [
                    'post_type'      => 'samples',
                    'posts_per_page' => 3,
                    'post__not_in'   => [ get_the_ID() ],
                    'tax_query'      => [
                        [
                            'taxonomy' => 'samples-categories',
                            'field'    => 'term_id',
                            'terms'    => $term_ids,
                        ],
                    ],
                ];

                $related_samples = new WP_Query( $args );

                if ( $related_samples->have_posts() ) :
                ?>
                    <ul class="you-might-like__list">
                        <?php while ( $related_samples->have_posts() ) : $related_samples->the_post(); ?>

                            <?php
                            get_template_part(
                                'template-parts/one-sample',
                                null,
                                [
                                    'sample_title' => get_the_title(),
                                    'sample_image' => get_field('sample_image'),
                                    'sample_link'  => get_permalink(),
                                ]
                            );
                            ?>

                        <?php endwhile; ?>
                    </ul>
                <?php
                endif;

                wp_reset_postdata();

            endif;
        endif;
        ?>
    </div>
  </div>
</section>

</main>

<?php
get_sidebar();
get_footer();
