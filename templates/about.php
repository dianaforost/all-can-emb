<?php
/*
Template Name: about
*/
get_header();
?>
<main>
   <section class="section our-story">
    <div class="container">
      <div class="inner-container our-story__container">
<?php
$story_title= get_field('our_story_title');
$story_text = get_field( 'our_story_text' );

if ( $story_title && $story_text ) :
?>
<h3 class="our-story__title"><?php echo esc_html( $story_title ); ?></h3>
    <p class="our-story__text"> <?php echo wp_kses_post( wpautop( $story_text ) ); ?></p>
<?php endif; ?>
      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">
      <div class="inner-container policy">
<?php
$policy_title= get_field('policy_title');
$policy_text = get_field( 'policy_text' );

if ( $policy_title && $policy_text ) :
?>
<h3 class="policy__title"><?php echo esc_html( $policy_title ); ?></h3>
      <p class="policy_text"> <?php echo wp_kses_post( wpautop( $policy_text ) ); ?></p>
<?php endif; ?>
      </div>
    </div>
  </section>

 <?php get_template_part('template-parts/work-with-us'); ?>
</main>


<?php get_footer(); ?>