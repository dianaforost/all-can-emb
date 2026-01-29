<section class="section join-us">
  <div class="container">
    <div class="inner-container work-with-us__container">
       <?php if ( get_field( 'work_with_us_title' ) ) : ?>
            <?php $work_with_us_button = get_field( 'work_with_us_button_text', 'option' );
            $work_with_us_link = get_field( 'work_with_us_button_link', 'option' ); ?>
            <h2 class="title">
                <?php the_field( 'work_with_us_title' ); ?>
            </h2>
            <p class="work-with-us__text"><?php the_field( 'work_with_us_text' ); ?></p>

            <?php if ( $work_with_us_button && $work_with_us_link ) : ?>
    <a class="button"
       href="<?php echo esc_url( $work_with_us_link['url'] ); ?>"
       target="<?php echo esc_attr( $work_with_us_link['target'] ?: '_self' ); ?>">
        <?php echo esc_html( $work_with_us_button ); ?>
    </a>
<?php endif; ?>

        <?php endif; ?>
      </div>
  </div>
</section>