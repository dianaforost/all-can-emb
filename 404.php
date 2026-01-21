<?php

get_header();
?>

	<main id="primary">
		<section class="section section-404">
			<div class="container">
				<div class="inner-container section-404__wrap">
					<h2 class="section-404__title"><?php the_field('404_title','option') ?></h2>
					<p class="section-404__text"><?php the_field('404_text','option'); ?></p>
					<a class="button" href="<?php the_field('404_button_link','option'); ?>"><?php the_field("404_button_text","option"); ?></a>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
