<?php
$dark_logo = get_field('dark_logo', 'options');
$dark_logo_mobile = get_field('dark_logo_mobile', 'options');

$adress = get_field('adress', 'options');
$phone = get_field('phone', 'options');
$email = get_field('e-mail', 'options');

$social_media = get_field('social_media', 'options');
?>


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