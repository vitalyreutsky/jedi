<?php
$title = get_field('title');
$description = get_field('description');

$all_posts = get_posts(array(
   'post_type' => 'projects',
   'posts_per_page' => -1,
));

$used_categories = get_terms(array(
   'taxonomy' => 'project_category',
   'hide_empty' => true,
));

if (!empty($used_categories) && !is_wp_error($used_categories)) {
   $other_category = null;
   foreach ($used_categories as $key => $category) {
      if ($category->slug === 'other') {
         $other_category = $category;
         unset($used_categories[$key]);
         break;
      }
   }

   if ($other_category) {
      $used_categories[] = $other_category;
   }
}
?>
<section class="projects" <?php echo isset($block['anchor']) ? 'id="' . $block['anchor'] . '"' : false ?>>
   <div class="container">
      <div class="projects__wrapper">
         <?php if ($title || $description) : ?>
            <div class="projects__text">
               <?php if ($title) : ?>
                  <h2 class="projects__title"><?php echo $title; ?></h2>
               <?php endif; ?>

               <?php if ($description) : ?>
                  <p class="projects__description"><?php echo $description; ?></p>
               <?php endif; ?>
            </div>
         <?php endif; ?>

         <div class="projects__tabs tabs">
            <ul class="tabs__nav list-reset">
               <li class="tabs__nav-item">
                  <button class="btn-reset tabs__nav-btn active" type="button" data-tab="tab-all">
                     <?php echo esc_html('All'); ?>
                  </button>
               </li>
               <?php foreach ($used_categories as $index => $category) : ?>
                  <li class="tabs__nav-item">
                     <button class="btn-reset tabs__nav-btn" type="button" data-tab="tab-<?php echo esc_attr($category->slug); ?>">
                        <?php echo esc_html($category->name); ?>
                     </button>
                  </li>
               <?php endforeach; ?>
            </ul>

            <div class="tabs__content">
               <div class="tabs__content-item fade active" id="tab-all">
                  <?php if (!empty($all_posts)) : ?>
                     <?php foreach ($all_posts as $post) : setup_postdata($post); ?>
                        <div class="tabs__content-item-image">
                           <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                        </div>
                  <?php endforeach;
                     wp_reset_postdata();
                  endif; ?>
               </div>

               <?php foreach ($used_categories as $index => $category) :
                  $posts = get_posts(array(
                     'post_type' => 'projects',
                     'tax_query' => array(
                        array(
                           'taxonomy' => 'project_category',
                           'field'    => 'slug',
                           'terms'    => $category->slug,
                        ),
                     ),
                     'posts_per_page' => -1,
                  ));
               ?>
                  <div class="tabs__content-item fade" id="tab-<?php echo esc_attr($category->slug); ?>">
                     <?php if (!empty($posts)) : ?>
                        <?php foreach ($posts as $post) : setup_postdata($post); ?>
                           <div class="tabs__content-item-image">
                              <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                           </div>
                     <?php endforeach;
                        wp_reset_postdata();
                     endif; ?>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>
</section>