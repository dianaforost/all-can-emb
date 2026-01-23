<?php
/*
Template Name: home
*/
get_header();
?>
    <main>
<section class="section main-section">
      <div class ="container">
       <div class ="inner-container main-section__wrap">
        <?php 
        $main_picture = get_field('main_picture');
        $main_title = get_field('main_title');
        $main_text = get_field('main_text');
        $button_text = get_field( 'main_button_text', 'option' );
        $button_link = get_field( 'main_button_link', 'option' );
        ?>
         <div class="main-section__list">
            <?php  if ($main_title) {?>
                <h1 class="main-section__title">
            <?php echo esc_html( $main_title ); ?>
                </h1>
            <?php } ?>
                <?php  if ($main_text) {?>
                    <p class="main-section__text">
                       <?php echo esc_html( $main_text ); ?>
                    </p>
                <?php } ?>

            <?php
                if ( $button_text && $button_link ) :
            ?>
    <a class="button"
       href="<?php echo esc_url( $button_link['url'] ); ?>"
       target="<?php echo esc_attr( $button_link['target'] ?: '_self' ); ?>">
        <?php echo esc_html( $button_text ); ?>
    </a>
            <?php endif; ?>
        </div>
            <?php
                if ( $main_picture ) :
            ?>
            <img class="main-section__image" src="<?php echo esc_url( $main_picture['url'] ); ?>" 
            alt="<?php echo esc_html( $main_picture['alt'] ); ?>"/>
            <?php endif; ?>
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
        $categories = get_terms([
          'taxonomy'   => 'category',
          'hide_empty' => false,
          'number'     => 3,
        ]);

if ( $categories ) :
?>
<ul class="depart__list">
     <?php foreach ( $categories as $category ) : ?>
              <?php
              get_template_part(
                'template-parts/one-category',
                null,
                [ 'category' => $category ]
              );
              ?>
            <?php endforeach; ?>
</ul>
<?php endif; ?>
<?php 
$departments_button_text = get_field('departments_button_text', 'option');
$departments_button  = get_field( 'departments_button', 'option' );
?>
<?php if ( $departments_button_text && $departments_button ) : ?>
    <a class="depart__content__link"
       href="<?php echo esc_url( $departments_button['url'] ); ?>"
       target="<?php echo esc_attr( $departments_button['target'] ?: '_self' ); ?>">
        <?php echo esc_html( $departments_button_text ); ?>
    </a>
<?php endif; ?>
      </div>
    </div>
</section>

<section class="section">
  <div class="container">
    <div class="inner-container why-us">
       <?php if ( get_field( 'why_us_section_title' ) ) : ?>
            <h2 class="why-us__title">
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
    <img class="why-us__list__item__icon" src="<?php echo esc_url( $icon_url['url'] ); ?>" 
    alt="<?php echo esc_html( $icon_url['alt'] ); ?>" loading="lazy">
<?php endif; ?>
              <div class="why-us__list__item__wrap">
                  <?php if ( get_sub_field( 'why_us_title' ) ) : ?>
                    <h3 class="why-us__list__item__title"><?php the_sub_field( 'why_us_title' ); ?></h3>
                <?php endif; ?>

                <?php if ( get_sub_field( 'why_us_text' ) ) : ?>
                    <p class="why-us__list__item__text"><?php the_sub_field( 'why_us_text' ); ?></p>
                <?php endif; ?>
              </div>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
    </div>
  </div>
</section>

<section class="section info">
  <div class="container">
    <div class="inner-container info__wrap">

      <div class="info__text-wrap">
       <?php 
$info_title = get_field('info_title');
$info_text = get_field('info_text');
$info_button_text = get_field('info_button_text', 'option');
$info_button_link  = get_field( 'info_button_link', 'option' );

if ( $info_title ) : 
?>
    <h3 class="info__text-wrap__title"><?php echo esc_html( $info_title ); ?></h3>
<?php endif; ?>

<?php if ( $info_text ) : ?>
    <p class="info__text-wrap__text"><?php echo esc_html( $info_text ); ?></p>
<?php endif; ?>

<?php if ( $info_button_text && $info_button_link ) : ?>
    <a class="info__text-wrap__button"
        href="<?php echo esc_url( $info_button_link['url'] ); ?>"
        target="<?php echo esc_attr( $info_button_link['target'] ?: '_self' ); ?>">
        <p class="info__text-wrap__button__text">
        <?php echo esc_html( $info_button_text ); ?>
        </p>
        <svg class="info__text-wrap__button__icon" width="30" height="30"><use href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#arrow-right"></use></svg>
    </a>
<?php endif; ?>
      </div>

      <?php $icon_url = get_field('info_image');
                  if ( $icon_url ) : 
                    $url = $icon_url['url'];
                    $alt = $icon_url['alt'];
       ?>
                <img class="info__image" src="<?php echo esc_url( $url ); ?>" 
                alt="<?php echo esc_attr( $alt ); ?>" loading="lazy"/>
                <?php endif; ?>
    </div>
  </div>
</section>

 <?php get_template_part('template-parts/work-with-us'); ?>
    </main>
<?php get_footer(); ?>