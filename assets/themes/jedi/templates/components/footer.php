<?php
// menu
$locations = get_nav_menu_locations();
$footer_menu_location = isset($locations['footer-menu']) ? $locations['footer-menu'] : null;

if ($footer_menu_location) {
  $nav_items = wp_get_nav_menu_items($footer_menu_location);
}

// options
$anchor = get_field('footer_anchor', 'options');
$copyright = get_field('copyright', 'options');

?>

<footer class="footer" <?php echo isset($anchor) ? 'id="' . $anchor . '"' : false ?>>
  <div class="container footer__container">
    <div class="footer__wrapper">
      <?php
      get_template_part('templates/components/footer/info');
      get_template_part('templates/components/footer/posts');
      get_template_part('templates/components/footer/form');
      ?>
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