<?php
/**
 * Sidebar for blog and archive pages
 */

if(!is_active_sidebar('sidebar_blog')){ return; }
?>

<section class="sidebar">
  <?php dynamic_sidebar('sidebar-blog'); ?>
</section>