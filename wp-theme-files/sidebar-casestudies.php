<?php
/**
 * Sidebar for Case Study archive pages
 */

if(!is_active_sidebar('sidebar-casestudies')){ return; }
?>

<section class="sidebar">
  <?php dynamic_sidebar('sidebar-blog'); ?>
</section>