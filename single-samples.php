<?php

get_header();
?>

<main id="primary" class="site-main">
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
<h1><?php the_title(); ?></h1>
<?php $image=get_field('sample_image'); ?>
<?php echo $image['url'] ?>

</main>

<?php
get_sidebar();
get_footer();
