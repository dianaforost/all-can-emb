<?php
/**
 * Expects:
 * $args['category'] → WP_Term
 */

$category = $args['category'] ?? null;

if ( ! $category ) {
    return;
}

$category_link  = get_category_link( $category->term_id );
$category_image = get_field( 'category_image', 'category_' . $category->term_id );
?>

<li class="what-we-do__category__list__item">
  <a class="what-we-do__category__list__item__link__wrap" href="<?php echo esc_url( $category_link ); ?>">
      <?php if ( $category_image['url'] ) : ?>
        <div class="what-we-do__category__list__item__image__wrap">
          <img class="what-we-do__category__list__item__image" 
          src="<?php echo esc_url( $category_image['url'] ); ?>" 
          alt="<?php echo esc_attr( $category->name ); ?>">
        </div>
        <?php endif; ?>
            <div class="what-we-do__category__list__item__link">
              <?php echo esc_html( $category->name ); ?>
            </div>
    </a>
</li>