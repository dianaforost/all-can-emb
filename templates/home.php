<?php
/*
Template Name: home
*/
get_header();
?>
    <main>
<section class="section" style ="height: 600px;">
    <div class ="section-image" style="background-image: url('<?php  echo get_field('main_picture'); ?>')">
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
    </main>



<?php get_footer(); ?>