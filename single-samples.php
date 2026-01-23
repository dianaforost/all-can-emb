<?php

get_header();
?>

<main id="primary" class="site-main">
  <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
<?php
// Get all categories (terms) for this sample
$categories = get_the_terms( get_the_ID(), 'samples-categories' );

if ( $categories && ! is_wp_error( $categories ) ) :
    $cat_links = [];

    foreach ( $categories as $category ) {
        $cat_links[] = '<a href="' . esc_url( get_term_link( $category ) ) . '">' . esc_html( $category->name ) . '</a>';
    }

    // Join multiple categories with comma
    echo implode( ', ', $cat_links );
    echo '</p>';
endif;
?>
<h1><?php the_title(); ?></h1>
<?php $image=get_field('sample_image'); ?>
<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']?>"  />

</main>

<?php
get_sidebar();
get_footer();
