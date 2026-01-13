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
        if($contacts_title & $contacts_text):?>
          <h2 class="contacts__wrap__title"><?php echo esc_html($contacts_title) ?></h2>
          <p class="contacts__wrap__text"> <?php echo esc_html($contacts_text) ?></p>
        <?php endif ?>
      </div>
    </div>
  </section>
  <section class="section">
    <div cass="container">
      <div class="inner-container"></div>
    </div>
  </section>
</main>



<?php get_footer(); ?>