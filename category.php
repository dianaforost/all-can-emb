<?php

get_header();
?>

<main>

<section class="section category__section">
  <div class="container">
    <div class="inner-container">
      <?php
        $current_category = get_queried_object();
        if ( $current_category && isset($current_category->name) ) :
        ?>
          <h2 class="category__title"><?php echo esc_html( $current_category->name ); ?></h2>
        <?php endif; ?>

        <?php
        // WP_Query for posts in this category
        $args = [
            'post_type' => 'post',                // regular posts
            'posts_per_page' => 6,                // adjust number per page
            'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
        ];

        // Filter by category if not “All”
        if ( $current_category && $current_category->slug !== 'all' ) {
            $args['category_name'] = $current_category->slug;
        }

        $samples = new WP_Query($args);

        if ( $samples->have_posts() ) : ?>
          <ul class="category__list">
            <?php while ( $samples->have_posts() ) : $samples->the_post(); ?>
              <?php
              $sample_title = get_field('sample_title');
              $sample_image = get_field('sample_image');
              $sample_link  = get_permalink();
              ?>
              <?php get_template_part(
                  'template-parts/one-sample',
                  null,
                  [
                      'sample_title' => $sample_title,
                      'sample_image' => $sample_image,
                      'sample_link'  => $sample_link,
                  ]
              ); ?>
            <?php endwhile; ?>
          </ul>

          <!-- Pagination -->
          <?php
          echo '<div class="pagination">';
          echo paginate_links([
              'total'   => $samples->max_num_pages,
              'current' => $paged,
              'mid_size' => 2,
              'prev_text' => __('« Prev'),
              'next_text' => __('Next »'),
          ]);
          echo '</div>';
          ?>
      <?php else : ?>
         <?php
$no_samples_text        = get_field('no_samples_text', 'option');
$no_samples_button_text = get_field('no_samples_button_text', 'option');
$no_samples_button      = get_field('no_samples_button', 'option');

if ( $no_samples_text ) :
?>
 <div class="no-items">
   <img class="no-items__image" src="<?php echo get_template_directory_uri()?>/assets/images/no-data.png" />
  <p class="no-items__title"><?php echo esc_html( $no_samples_text ); ?></p>

  <?php if ( $no_samples_button && $no_samples_button_text ) : ?>
    <a class="button" href="<?php echo esc_url( $no_samples_button['url'] ); ?>" class="btn">
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