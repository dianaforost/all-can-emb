<?php get_header(); ?> 
<main>
<?php
$category = get_queried_object();

if ( $category ) :
?>
    <h1><?php echo esc_html( $category->name ); ?></h1>
<?php endif; ?>
</main>
<?php get_footer(); ?>   