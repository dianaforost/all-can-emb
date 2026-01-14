<?php
/*
Template Name: contacts
*/
get_header();
?>
<main>
  <section class="section">
    <div class="container">
      <div class="inner-container contacts__wrap">
        <?php $contacts_title=get_field('contacts_title');
        $contacts_text= get_field('contacts_text'); 
        if($contacts_title && $contacts_text):?>
          <h2 class="contacts__wrap__title"><?php echo esc_html($contacts_title) ?></h2>
          <p class="contacts__wrap__text"> <?php echo esc_html($contacts_text) ?></p>
        <?php endif ?>
      </div>
    </div>
  </section>
  <section class="section">
    <div cass="container">
      <div class="inner-container">
       <h3 class="our-team__title"><?php echo esc_html(get_field('our_team_title')) ?></h3>
       <?php if (have_rows('our_team_member')) : ?>
        <ul class="our-team__member">
          <?php while ( have_rows( 'our_team_member' ) ) : the_row();?>
          <li class="our-team__member__item">
           <div class="our-team__member__item__wrap">
             <h4><?php echo get_sub_field('our_team_member_full_name') ?></h4>
              <p><?php echo get_sub_field('our_team_member_title') ?></p> 
           </div>
            <?php if(have_rows('our_team_member_contacts')) :?>
            <div class="our-team__member__item__contacts">
              <?php while (have_rows('our_team_member_contacts')) : the_row(); ?>
              <div class="our-team__member__item__contacts__wrap">
              <p><?php echo get_sub_field('our_team_member_contact_title') ?></p>


              <?php if ( have_rows('our_team_member_contact_repeater') ) : ?>
              <div>
                <?php
                $i = 0;

                while ( have_rows('our_team_member_contact_repeater') ) : the_row();
                  if ( $i > 0 ) {
                    echo ', ';
                  }
                  echo esc_html( get_sub_field('our_team_member_contact') );
                  $i++;
                endwhile;
                ?>
              </div>
            <?php endif; ?>


            </div>
              <?php endwhile ?>
            </div>
            <?php endif ?>
          </li>
          <?php endwhile ?>
        </ul>
        <?Php endif ?>
      </div>
    </div>
  </section>
</main>



<?php get_footer(); ?>