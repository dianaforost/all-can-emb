<?php
/**
 * Expects:
 * $args['category'] → WP_Term
 */

$category = $args['category'] ?? null;

if ( ! $category ) {
    return;
}

$category_image = get_field(
    'category_image',
    'samples-categories_' . $category->term_id
);

$category_link = get_term_link( $category );
?>

<li class="what-we-do__category__list__item">
  <a class="what-we-do__category__list__item__link__wrap"
     href="<?php echo esc_url($category_link); ?>">

    <?php if ( $category_image && isset($category_image['url']) ) : ?>
      <img class="what-we-do__category__list__item__image"
           src="<?php echo esc_url($category_image['url']); ?>"
           alt="<?php echo esc_attr($category->name); ?>">
           <?php endif; ?>
           <div class="what-we-do__category__list__item__image__wrap"></div>

    <div class="what-we-do__category__list__item__link">
      <p><?php echo esc_html($category->name); ?></p>
    </div>

  </a>
</li>