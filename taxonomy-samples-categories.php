<?php

get_header();
?>

<main>
<section class="section category">
  <div class="container">
    <div class="inner-container">
      <h2><?php echo esc_html( single_term_title('', false) ); ?></h2>
      <?php if (have_posts()) : ?>
      <ul>
        <?php while( have_posts()) : the_post(); ?>
        <?php
        $sample_title = get_field('sample_title');
        $sample_image = get_field('sample_image');
        ?>
          <?php get_template_part(
            'template-parts/one-sample',
            null,
            [
              'sample_title' => $sample_title,
              'sample_image' => $sample_image
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