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
<h2 class="our-story__title"><?php echo esc_html( $story_title ); ?></h2>
<div class=" our-story__text-wrap">
  <?php echo wp_kses_post( wpautop( $story_text ) ); ?>
</div>
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
      <div class="policy__text-wrap">
        <?php echo wp_kses_post( wpautop( $policy_text ) ); ?>
      </div>
<?php endif; ?>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="inner-container">
        <?php $companies_we_work_with_title= get_field('companies_we_work_with_title');
        if($companies_we_work_with_title): ?>
        <h3 class="companies__title"><?php echo esc_html($companies_we_work_with_title); ?></h3>
        <?php endif ?>

        <?php if (have_rows('companies')):?>
          <ul class="companies__list">
            <?php while(have_rows('companies')): the_row() ?>
            <li class="companies__list__item">
            <?php $company_logo = get_sub_field('company_logo'); ?>

              <?php if ( $company_logo ) : ?>
                <img width="60"
                  src="<?php echo esc_url( $company_logo['url'] ); ?>" 
                  alt="<?php echo esc_attr( $company_logo['alt'] ); ?>" 
                  loading="lazy"
                />
              <?php endif; ?>
              <p><?php echo esc_html( get_sub_field('company_title'));?></p>
            </li>
              <?php endwhile ?>
          </ul>
          <?php endif ?>
      </div>
    </div>
  </section>

 <?php get_template_part('template-parts/work-with-us'); ?>
</main>


<?php get_footer(); ?>