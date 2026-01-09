<?php
/*
Template Name: about
*/
get_header();
?>
<main>
<section class="section">
    <div class="container">
      <div class="inner-container about">
<?php
$about_title= get_field('about_title');
$about_text = get_field( 'about_text' );

if ( $about_title && $about_text ) :
?>
<h1><?php echo esc_html( $about_title ); ?></h1>
    <p><?php echo esc_html( $about_text ); ?></p>
<?php endif; ?>
      </div>
    </div>
  </section>


   <section class="section">
    <div class="container">
      <div class="inner-container">
<?php
$story_title= get_field('our_story_title');
$story_text = get_field( 'our_story_text' );

if ( $story_title && $story_text ) :
?>
<h3><?php echo esc_html( $story_title ); ?></h3>
    <p><?php echo esc_html( $story_text ); ?></p>
<?php endif; ?>
      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">
      <div class="inner-container">
<?php
$policy_title= get_field('policy_title');
$policy_text = get_field( 'policy_text' );

if ( $policy_title && $policy_text ) :
?>
<h3><?php echo esc_html( $policy_title ); ?></h3>
    <p><?php echo esc_html( $policy_text ); ?></p>
<?php endif; ?>
      </div>
    </div>
  </section>

 <?php get_template_part('template-parts/work-with-us'); ?>
</main>


<?php get_footer(); ?>