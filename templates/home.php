<?php
/*
Template Name: home
*/
get_header();
?>
    <main>
<section class="section main-section" style ="height: 600px;">
<?php 
$main_picture = get_field('main_picture');
if ( $main_picture ) :
?>
<div class="section-image" style="background-image: url('<?php echo esc_url( $main_picture['url'] ); ?>');">
<?php endif; ?>
    </div>
      <div class ="container">
       <div class ="content">
         <ul>
            <li> <?php  if (get_field( 'main_title' )) {?>
                    <h1 class="main-title">
                        <?php the_field("main_title")?>
                    </h1>
                    <?php } ?></li>
            <li><?php  if (get_field( 'main_text' )) {?>
                    <p class="main-text">
                        <?php the_field("main_text")?>
            </p>
                    <?php } ?>
              </li>
            <li>

            <?php  if (get_field( 'main_button_text' )) {?>
                    <button class="main-button">
                        <?php the_field("main_button_text")?>
            </button>
                    <?php } ?>
              </li>
         </ul>
       </div>
</div>
</section>


<section class="section depart">
    <div class="container">
      <div class="inner-container depart__content">
         <?php if ( get_field( 'depart_title' ) ) : ?>
            <h2 class="depart__title">
                <?php the_field( 'depart_title' ); ?>
            </h2>
        <?php endif; ?>


<?php 
$categories = get_categories([
    'hide_empty' => false,
    'exclude'    => [1]
]);

if ( $categories ) :
?>
<ul class="depart__list">
    <?php foreach ( $categories as $category ) :  
        $link = get_category_link( $category->term_id );
    ?>
        <li class="depart__list__item">
            <a href="<?php echo esc_url( $link ); ?>">
                <?php echo esc_html( $category->name ); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
      </div>
    </div>
</section>
<section class="section">
  <div class="container">
    <div class="inner-container why-us">
       <?php if ( get_field( 'why_us_section_title' ) ) : ?>
            <h2 class="why_us_title">
                <?php the_field( 'why_us_section_title' ); ?>
            </h2>
        <?php endif; ?>

        <?php if ( have_rows( 'why_us' ) ) : ?>
    <ul class="why-us__list">

        <?php while ( have_rows( 'why_us' ) ) : the_row(); ?>

            <li class="why-us__list__item">
              <?php $icon_url = get_sub_field('why_us_icon');
                  if ( $icon_url ) : 
                ?>
    <img class="why-us__list__item__icon" src="<?php echo esc_url( $icon_url ); ?>" alt="">
<?php endif; ?>
              <div class="why-us__list__item__wrap">
                  <?php if ( get_sub_field( 'why_us_title' ) ) : ?>
                    <h3><?php the_sub_field( 'why_us_title' ); ?></h3>
                <?php endif; ?>

                <?php if ( get_sub_field( 'why_us_text' ) ) : ?>
                    <p><?php the_sub_field( 'why_us_text' ); ?></p>
                <?php endif; ?>
              </div>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
    </div>
  </div>
</section>
    </main>


<?php get_footer(); ?>