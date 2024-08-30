<?php
$locations = get_nav_menu_locations();
$header_menu_location = isset($locations['header-menu']) ? $locations['header-menu'] : null;

if ($header_menu_location) {
   $nav_items = wp_get_nav_menu_items($header_menu_location);
}

$light_logo = get_field('light_logo', 'options');
$light_logo_mobile = get_field('light_logo_mobile', 'options');
?>

<header class="header">
   <div class="container header__container">
      <div class="header__wrapper">
         <?php if ($light_logo) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
               <?php echo App\Base\SvgSupport::get_inline_svg_by_id($light_logo); ?>
            </a>
         <?php endif; ?>

         <?php if (!empty($nav_items)) : ?>
            <div class="header__nav" data-menu>
               <nav class="nav" title="nav-menu">
                  <ul class="nav__list list-reset">
                     <?php
                     foreach ($nav_items as $ind => $nav_item) :
                     ?>
                        <li class="nav__item">
                           <a href="<?php echo esc_url($nav_item->url); ?>" class="nav__link navigation__item" data-menu-item>
                              <?php echo esc_html($nav_item->title); ?>
                           </a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </nav>
            </div>
         <?php endif; ?>

         <button class="btn-reset burger" aria-label="Открыть меню" aria-expanded="false" data-burger>
            <span class="burger__line"></span>
         </button>

         <?php if (!empty($nav_items)) {
            foreach ($nav_items as $ind => $nav_item) :
               if ($ind == 0) {
         ?>
                  <p class="header__mobil-item"><?php echo esc_html($nav_item->title); ?></p>
            <?php
               }
            endforeach; ?>
         <?php } ?>
      </div>

      <?php if ($light_logo_mobile) : ?>
         <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo header__logo--mobile">
            <?php echo App\Base\SvgSupport::get_inline_svg_by_id($light_logo_mobile); ?>
         </a>
      <?php endif; ?>
   </div>
</header>