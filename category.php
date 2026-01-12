<?php get_header(); ?> 

<main>
<?php
$category = get_queried_object();

if ( $category ) :
?>
    <h1><?php echo esc_html( $category->name ); ?></h1>
    <p><?php echo esc_html( category_description($category->term_id) ); ?></p>
<?php endif; ?>

<div class="samples-grid">

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article class="sample-card">
            <a href="<?php the_permalink(); ?>">

                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php endif; ?>

                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>

                <?php 
                // Get ACF image field safely
                $sample_image = get_field('sample_image'); 
                if ( $sample_image && is_array($sample_image) ) : ?>
                    <img src="<?php echo esc_url( $sample_image['url'] ); ?>" alt="<?php echo esc_attr($sample_image['alt']); ?>">
                <?php endif; ?>

            </a>
        </article>
    <?php endwhile;
else : ?>
    <p>No samples found in this category.</p>
<?php endif; ?>

</div>

</main>

<?php get_footer(); ?>