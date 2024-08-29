<?php
$locations = get_nav_menu_locations();
$header_menu_location = isset($locations['header-menu']) ? $locations['header-menu'] : null;

if ($header_menu_location) {
   $nav_items = wp_get_nav_menu_items($header_menu_location);
}

$header__logo = get_field('header_logo', 'options');
?>

<header class="header">
   <div class="container">
      <div class="header__wrapper">
         <?php if ($header__logo) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
               <?php echo App\Base\SvgSupport::get_inline_svg_by_id($header__logo); ?>
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
                           <a href="<?php echo esc_url($nav_item->url); ?>" class="nav__link navigation__item <?php echo $ind === 0 ? 'active' : null; ?>">
                              <?php echo esc_html($nav_item->title); ?>
                           </a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </nav>
            </div>
         <?php endif; ?>
      </div>
   </div>
</header>