<?php

get_header();
?>

<main>
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<section class="section category">
  <div class="container">
    <div class="inner-container">
      <h2 class="category__title"><?php echo esc_html( single_term_title('', false) ); ?></h2>

      <?php
      $current_term = get_queried_object();

      if ( $current_term && $current_term->slug === 'all' ) {

          $args = [
              'post_type' => 'samples',
              'posts_per_page' => -1,
              'orderby'        => 'date'
          ];
          $samples = new WP_Query($args);
      } else {
          $samples = new WP_Query([
              'post_type' => 'samples',
              'tax_query' => [
                  [
                      'taxonomy' => 'samples-categories',
                      'field'    => 'slug',
                      'terms'    => $current_term->slug,
                  ],
              ],
              'posts_per_page' => -1
          ]);
      }

      if ( $samples->have_posts() ) : ?>
        <ul class="category__list">
          <?php while( $samples->have_posts() ) : $samples->the_post(); ?>
          <?php
          $sample_title = get_field('sample_title');
          $sample_image = get_field('sample_image');
          $sample_link = get_permalink(); 

          $sample_category = '';
          $categories = get_the_terms( get_the_ID(), 'samples-categories' );
          if ( $categories && ! is_wp_error( $categories ) ) {
              foreach ( $categories as $category ) {
                  if ( $category->slug === 'all' ) continue;
                  $sample_category = $category->name;
                  break;
              }
          }
          ?>
          <?php get_template_part(
              'template-parts/one-sample',
              null,
              [
                  'sample_title' => $sample_title,
                  'sample_image' => $sample_image,
                  'sample_link' => $sample_link,
                  'sample_category' => $sample_category
              ]
          ); ?>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
         <?php
$no_samples_text        = get_field('no_samples_text', 'option');
$no_samples_button_text = get_field('no_samples_button_text', 'option');
$no_samples_button      = get_field('no_samples_button', 'option');

if ( $no_samples_text ) :
?>
 <div class="category__no-samples">
   <img class="category__no-samples__image" src="<?php echo get_template_directory_uri()?>/assets/images/no-data.png" />
  <p class="category__no-samples__title"><?php echo esc_html( $no_samples_text ); ?></p>

  <?php if ( $no_samples_button && $no_samples_button_text ) : ?>
    <a class="category__no-samples__link" href="<?php echo esc_url( $no_samples_button['url'] ); ?>" class="btn">
      <?php echo esc_html( $no_samples_button_text ); ?>
    </a>
  <?php endif; ?>
 </div>

<?php endif; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</section>
</main>

<?php
get_footer();