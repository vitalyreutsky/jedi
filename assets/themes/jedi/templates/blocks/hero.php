<?php $images = get_field('images'); ?>

<?php if (!empty($images)) : ?>
   <section class="hero" <?php echo isset($block['anchor']) ? 'id="' . $block['anchor'] . '"' : false ?>>
      <div class="container">
         <div class="hero__wrapper">
            <div class="swiper hero__images">
               <div class="swiper-wrapper hero__images-wrapper">
                  <?php foreach ($images as $image) :
                     if (isset($image['image'])) {
                  ?>
                        <div class="swiper-slide hero__images-slide">
                           <?php echo wp_get_attachment_image($image['image'], 'full'); ?>
                        </div>
                  <?php
                     }
                  endforeach; ?>
               </div>

               <div class="hero__arrow hero__arrow--left"></div>
               <div class="hero__arrow hero__arrow--right"></div>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>