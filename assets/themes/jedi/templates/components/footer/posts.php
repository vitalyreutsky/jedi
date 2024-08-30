<?php
$title_posts = get_field('title_posts', 'options');

$args = [
   'post_type'      => 'post',
   'posts_per_page' => 3,
   'orderby'        => 'date',
   'order'          => 'DESC'
];
$posts = get_posts($args);
?>

<div class="footer__column footer__column--posts">
   <?php if (!empty($title_posts)) : ?>
      <h3 class="footer__column-title"><?php echo esc_html($title_posts); ?></h3>
   <?php endif; ?>

   <?php if (!empty($posts)) {
      foreach ($posts as $post) :
         setup_postdata($post);
   ?>
         <a href="<?php echo get_permalink(); ?>" class="footer__column-post footer__post">
            <div class="footer__post-image">
               <?php echo get_the_post_thumbnail($post, 'thumbnail');  ?>
            </div>

            <div class="footer__post-content">
               <p class="footer__post-date"><?php echo esc_html(get_the_date('m/d/Y')); ?></p>
               <p class="footer__post-title"><?php echo esc_html(get_the_title()); ?></p>
            </div>
         </a>
   <?php endforeach;
      wp_reset_postdata();
   } ?>
</div>