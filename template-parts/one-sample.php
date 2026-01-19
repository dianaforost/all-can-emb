<?php
$sample_title = $args['sample_title'] ?? '';
$sample_image = $args['sample_image'] ?? null;
$sample_category=$args['sample_category'] ?? '';
?>

<li class="sample">

  <?php if ( $sample_image ) : ?>
    <img class="sample__image"
      src="<?php echo esc_url( $sample_image['url'] ); ?>"
      alt="<?php echo esc_attr( $sample_image['alt'] ); ?>"
    >
  <?php endif; ?>
  
<div class="sample__wrap">
  <?php if( $sample_category) : ?>
  <p class="sample__category"> <?php echo esc_html($sample_category) ?></p>
<?php endif; ?>

  <?php if ( $sample_title ) : ?>
    <h3 class="sample__title"><?php echo esc_html( $sample_title ); ?></h3>
  <?php endif; ?>
</div>

</li>