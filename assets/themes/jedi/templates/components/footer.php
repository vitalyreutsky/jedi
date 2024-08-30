<?php
$locations = get_nav_menu_locations();
$footer_menu_location = isset($locations['footer-menu']) ? $locations['footer-menu'] : null;

if ($footer_menu_location) {
  $nav_items = wp_get_nav_menu_items($footer_menu_location);
}

$dark_logo = get_field('dark_logo', 'options');
$dark_logo_mobile = get_field('dark_logo_mobile', 'options');
$adress = get_field('adress', 'options');
$phone = get_field('phone', 'options');
$email = get_field('e-mail', 'options');
$social_media = get_field('social_media', 'options');
$title_posts = get_field('title_posts', 'options');
$title_contacts = get_field('title_contacts', 'options');
$anchor = get_field('footer_anchor', 'options');
$copyright = get_field('copyright', 'options');

$args = [
  'post_type'      => 'post',
  'posts_per_page' => 3,
  'orderby'        => 'date',
  'order'          => 'DESC'
];
$posts = get_posts($args);
?>

<footer class="footer" <?php echo isset($anchor) ? 'id="' . $anchor . '"' : false ?>>
  <div class="container footer__container">
    <div class="footer__wrapper">
      <div class="footer__column footer__column--info">
        <?php if ($dark_logo) : ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
            <?php echo App\Base\SvgSupport::get_inline_svg_by_id($dark_logo); ?>
          </a>
        <?php endif; ?>

        <?php if ($dark_logo_mobile) : ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo footer__logo--mobile">
            <?php echo App\Base\SvgSupport::get_inline_svg_by_id($dark_logo_mobile); ?>
          </a>
        <?php endif; ?>

        <?php if (!empty($adress) || !empty($phone) || !empty($email)) : ?>
          <div class="footer__info">
            <?php if (!empty($adress['title']) && !empty($adress['info'])) : ?>
              <div class="footer__info-item footer__info-item--adress">
                <h4 class="footer__info-title"><?php echo $adress['title']; ?></h4>
                <p class="footer__info-text"><?php echo $adress['info']; ?></p>
              </div>
            <?php endif; ?>

            <?php if (!empty($phone['title']) && !empty($phone['info'])) : ?>
              <div class="footer__info-item footer__info-item--phone">
                <h4 class="footer__info-title"><?php echo esc_html($phone['title']); ?></h4>
                <p class="footer__info-text"><?php echo esc_html($phone['info']); ?></p>
              </div>
            <?php endif; ?>

            <?php if (!empty($email['title']) && !empty($email['info'])) : ?>
              <div class="footer__info-item footer__info-item--email">
                <h4 class="footer__info-title"><?php echo esc_html($email['title']); ?></h4>
                <p class="footer__info-text"><?php echo esc_html($email['info']); ?></p>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>


        <?php if (!empty($social_media)) : ?>
          <div class="footer__social">
            <?php foreach ($social_media as $social) :
              $link = isset($social['link']) ? esc_url($social['link']) : '';
              $icon = isset($social['icon']) ? wp_get_attachment_image($social['icon'], 'full') : '';
            ?>
              <a href="<?php echo $link; ?>" target="_blank" class="footer__social-item">
                <?php echo $icon; ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

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

      <div class="footer__column footer__column--contacts">
        <?php if (!empty($title_contacts)) : ?>
          <h3 class="footer__column-title"><?php echo esc_html($title_contacts); ?></h3>
        <?php endif; ?>

        <div class="footer__column-form">
          <?php get_template_part('templates/components/form'); ?>
        </div>
      </div>
    </div>

    <?php if (!empty($nav_items) || !empty($copyright)) {
      if (!empty($copyright)) : ?>
        <p class="footer__copyright"><?php echo $copyright; ?>
          <?php foreach ($nav_items as $key => $nav_item) {
            if ($key == 0) : ?>
              <a href="<?php echo esc_url($nav_item->url); ?>">
                <?php echo esc_html($nav_item->title); ?>
              </a>
          <?php endif;
          } ?>
        </p>
    <?php endif;
    } ?>
  </div>
</footer>