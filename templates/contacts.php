<?php
/*
Template Name: contacts
*/
get_header();
?>
<main>
  <section class="section">
    <div class="container">
      <div class="inner-container contacts">
        <?php $contacts_title=get_field('contacts_title');
        $contacts_text= get_field('contacts_text'); 
        if($contacts_title && $contacts_text):?>
         <div class="contacts__wrap">
           <h2 class="contacts__wrap__title"><?php echo esc_html($contacts_title) ?></h2>
            <p class="contacts__wrap__text"> <?php echo esc_html($contacts_text) ?></p>
         </div>
        <?php endif ?>
        <div class="contacts__container">
        <?php $company_address= get_field('company_address');
        $company_address_link =get_field('company_address_link');
        if($company_address && $company_address_link): ?>
         <a class="contacts__address" href="<?php echo esc_html($company_address_link) ?>"> <svg width="40px" height="40px"><use href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#icon-map"></use></svg><?php echo wp_kses_post( wpautop( $company_address ) ); ?></a>
          <?php endif ?>
          <?php $company_phone_number = get_field('company_phone_number');
        if($company_phone_number): ?>
        <a class="contacts__phone" href="tel:<?php echo esc_html($company_phone_number) ?>"><svg width="40px" height="40px"><use href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#icon-phone"></use></svg><p><?php echo esc_html($company_phone_number) ?></p></a>
        <?php endif ?>
      </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div cass="container">
      <div class="inner-container">
       <h3 class="our-team__title"><?php echo esc_html(get_field('our_team_title')) ?></h3>
       <?php if ( have_rows('our_team_member') ) : ?>
  <ul class="our-team__member">
    <?php while ( have_rows('our_team_member') ) : the_row(); ?>
      <li class="our-team__member__item">
        <div class="our-team__member__item__wrap">
          <h4 class="our-team__member__item__name">
          <?php echo esc_html( get_sub_field('our_team_member_full_name') ); ?>
       </h4>

        <p class="our-team__member__item__title">
          <?php echo esc_html( get_sub_field('our_team_member_title') ); ?>
        </p>
        </div>
        
        <div class="our-team__member__item__contacts">
          
          <!-- EMAILS -->
          <?php if ( have_rows('our_team_member_email_wrap') ) : ?>
            <div class="our-team__member__item__contacts__wrap">
            <p class="our-team__member__item__contacts__wrap__title">Email:</p>
              <?php
    $emails = [];

    while ( have_rows('our_team_member_email_wrap') ) : the_row();
      $email = get_sub_field('our_team_member_email');

      if ( $email ) {
        $emails[] =
          '<a class="our-team__member__item__contacts__wrap__link" href="mailto:' . esc_attr( $email ) . '">' .
          esc_html( $email ) .
          '</a>';
      }
    endwhile;

    echo implode(', ', $emails);
    ?>
    </div>
<?php endif; ?>

        <!-- EXTENSIONS -->
        <?php if ( have_rows('our_team_member_extension_wrap') ) : ?>
          <div class="our-team__member__item__contacts__wrap">
             <p class="our-team__member__item__contacts__wrap__title">Ext:</p>
            <?php
            $extensions = [];

            while ( have_rows('our_team_member_extension_wrap') ) : the_row();
              $ext = get_sub_field('our_team_member_extension');

              if ( $ext ) {
                $extensions[] =
                  '<p>' .
                  esc_html( $ext ) .
                  '</p>';
              }
            endwhile;

            echo implode(', ', $extensions);
            ?>
          </div>
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