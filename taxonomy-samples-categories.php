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

     $paged = max( 1, get_query_var('paged') );

$args = [
    'post_type' => 'samples',
    'posts_per_page' => 6,
    'paged' => $paged,
];

if ( $current_term && $current_term->slug !== 'all' ) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'samples-categories',
            'field'    => 'slug',
            'terms'    => $current_term->slug,
        ],
    ];
}

$samples = new WP_Query($args);
      ?>

      <?php if ( $samples->have_posts() ) : ?>

        <ul class="category__list">
          <?php while ( $samples->have_posts() ) : $samples->the_post(); ?>

            <?php
            $sample_title = get_field( 'sample_title' );
            $sample_image = get_field( 'sample_image' );
            $sample_link  = get_permalink();
            ?>

            <?php
            get_template_part(
              'template-parts/one-sample',
              null,
              [
                'sample_title' => $sample_title,
                'sample_image' => $sample_image,
                'sample_link'  => $sample_link,
              ]
            );
            ?>

          <?php endwhile; ?>
        </ul>

        <!-- Pagination -->
        <div class="pagination">
          <?php
          echo paginate_links( [
              'total'     => $samples->max_num_pages,
              'current'   => $paged,
              'mid_size'  => 2,
              'prev_text' => '« Prev',
              'next_text' => 'Next »',
          ] );
          ?>
        </div>

      <?php else : ?>

        <?php
        $no_samples_text        = get_field( 'no_samples_text', 'option' );
        $no_samples_button_text = get_field( 'no_samples_button_text', 'option' );
        $no_samples_button      = get_field( 'no_samples_button', 'option' );

        if ( $no_samples_text ) :
        ?>
          <div class="no-items">
            <img
              class="no-items__image"
              src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-data.png' ); ?>"
              alt=""
            />
            <p class="no-items__title">
              <?php echo esc_html( $no_samples_text ); ?>
            </p>

            <?php if ( $no_samples_button && $no_samples_button_text ) : ?>
              <a
                class="button"
                href="<?php echo esc_url( $no_samples_button['url'] ); ?>"
              >
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