<?php
/*
Template Name: news
*/
get_header();
?>
<main>
 <section class="section news">
  <div class="conatiner">
    <div class="inner-container">
      <h2 class="news__title"><?php the_title(); ?></h2>
      <?php $news_items = get_field('add_new_news_item');
      if ( $news_items ) {
    usort($news_items, function($a, $b) {
        $dateA = DateTime::createFromFormat('F j, Y', $a['new_news_item_date']);
        $dateB = DateTime::createFromFormat('F j, Y', $b['new_news_item_date']);
        return $dateB <=> $dateA; // newest first
    });
}
      if ( $news_items ) : ?>
    <ul class="news__list">
        <?php foreach ( $news_items as $news ) : ?>
            <?php 
                $title = $news['new_news_item_title'];
                $text = $news['new_news_item_description'];
                $date = $news['new_news_item_date'];
                $datetime = DateTime::createFromFormat('F j, Y', $date)->format('Y-m-d');
                $image = $news['new_news_item_picture'];
            ?>
            <li class="news__list__item">
                  <img 
                    class="news__list__item__image" 
                    src="<?php echo esc_url($image['url']); ?>" 
                    alt="<?php echo esc_attr($image['alt']); ?>" 
                    loading="lazy"
                  />
                <div class="news__list__item__wrap">
                  <h3 class="news__list__item__wrap__title"><?php echo esc_html($title); ?></h3>
                  <time class="news__list__item__wrap__date" datetime="<?php echo esc_attr($datetime); ?>">
                      <?php echo esc_html($date); ?>
                  </time>
                <div class="news__list__item__wrap__text"><?php echo wp_kses_post(wpautop($text)); ?></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
  <?php else : ?>
  <?php $no_news=get_field('no_news'); ?>
  <p><?php echo esc_html($no_news) ?></p>
  <?php endif; ?>
    </div>
  </div>
 </section>
</main>
<?php get_footer(); ?>