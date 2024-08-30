<?php
$title = get_field('title');
$cards = get_field('cards');
?>

<section class="features" <?php echo isset($block['anchor']) ? 'id="' . $block['anchor'] . '"' : false ?>>
   <div class="container">
      <div class="features__wrapper">
         <?php if ($title) : ?>
            <h2 class="features__title"><?php echo $title; ?></h2>
         <?php endif; ?>

         <div class="features__cards">
            <?php foreach ($cards as $card) : ?>
               <div class="features__card">
                  <div class="features__card-icon">
                     <?php echo wp_get_attachment_image($card['icon'], 'full'); ?>
                  </div>
                  <div class="features__card-content">
                     <?php echo $card['content']; ?>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</section>