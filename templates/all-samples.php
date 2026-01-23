<?php
/*
Template Name: All Samples
*/
get_header();
?>
<main>
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
<section class="section category__section">
  <div class="container">
    <div class="inner-container">
      <h2 class="category__title"><?php the_title(); ?></h2>

      <?php
      $paged = max(1, get_query_var('paged'));

      $query = new WP_Query([
          'post_type' => 'samples',  // your CPT
          'posts_per_page' => 6,
          'paged' => $paged,
      ]);
      ?>

      <?php if ($query->have_posts()) : ?>
        <ul class="category__list">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
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

        <div class="pagination">
          <?php
          echo paginate_links([
              'total' => $query->max_num_pages,
              'current' => $paged,
               'prev_text' => '<',
              'next_text' => '>',
          ]);
          ?>
        </div>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

    </div>
  </div>
</section>
</main>

<?php get_footer(); ?>