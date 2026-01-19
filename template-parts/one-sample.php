<?php
$sample_title = $args['sample_title'] ?? '';
$sample_image = $args['sample_image'] ?? null;
?>

<li class="one-sample">

  <?php if ( $sample_image ) : ?>
    <img
      src="<?php echo esc_url( $sample_image['url'] ); ?>"
      alt="<?php echo esc_attr( $sample_image['alt'] ); ?>"
    >
  <?php endif; ?>

  <?php if ( $sample_title ) : ?>
    <h3><?php echo esc_html( $sample_title ); ?></h3>
  <?php endif; ?>

</li>