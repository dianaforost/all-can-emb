<?php

get_header();
?>

<main id="primary" class="site-main">
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
<h1><?php the_title(); ?></h1>

</main>

<?php
get_sidebar();
get_footer();