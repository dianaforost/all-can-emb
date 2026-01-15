<?php
/*
Template Name: news
*/
get_header();
?>
<main>
 <section class="section">
  <div class="conatiner">
    <div class="inner-container">
      <?php $news_items = get_field('add_new_news_item');
      if ( $news_items ) {
    usort($news_items, function($a, $b) {
        $dateA = DateTime::createFromFormat('F j, Y', $a['new_news_item_date']);
        $dateB = DateTime::createFromFormat('F j, Y', $b['new_news_item_date']);
        return $dateB <=> $dateA; // newest first
    });
}
      if ( $news_items ) : ?>
    <ul>
        <?php foreach ( $news_items as $news ) : ?>
            <?php 
                $title = $news['new_news_item_title'];
                $text = $news['new_news_item_description'];
                $date = $news['new_news_item_date'];
                $datetime = DateTime::createFromFormat('F j, Y', $date)->format('Y-m-d');
            ?>
            <li>
                <h3><?php echo esc_html($title); ?></h3>
                <div><?php echo wp_kses_post(wpautop($text)); ?></div>
                <time datetime="<?php echo esc_attr($datetime); ?>">
                    <?php echo esc_html($date); ?>
                </time>
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