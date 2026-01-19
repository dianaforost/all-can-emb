<?php

get_header();
?>

<main>
<section class="section category">
  <div class="container">
    <div class="inner-container">
      <h2 class="category__title"><?php echo esc_html( single_term_title('', false) ); ?></h2>
      <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
      <?php if (have_posts()) : ?>
      <ul class="category__list">
        <?php while( have_posts()) : the_post(); ?>
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
        <p>No samples found</p>
      <?php endif; ?>
    </div>
  </div>
</section>
</main>

<?php
get_footer();