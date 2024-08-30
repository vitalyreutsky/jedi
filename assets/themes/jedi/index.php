<?php

/**
 * Base page template
 *
 * @package WordPress
 * @since 1.0.0
 *
 * @link    https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

get_header();
?>
<main class="main">
   <div class="container">
      <?php the_content(); ?>
   </div>
</main>
<?php
get_footer(); ?>