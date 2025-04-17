<?php
/*
* Template Name: Top page
*/
get_header();
?>

<div class="main-content p-home">    
    <?php get_template_part('template-parts/top/banner'); ?>
    <?php get_template_part('template-parts/top/services'); ?>
    <?php get_template_part('template-parts/top/technology'); ?>
    <?php get_template_part('template-parts/top/clients'); ?>
    <?php get_template_part('template-parts/top/about'); ?>
    <?php get_template_part('template-parts/top/informations'); ?>
    <?php get_template_part('template-parts/top/members'); ?>
    <?php get_template_part('template-parts/top/news'); ?>
    <?php get_template_part('template-parts/top/contact'); ?>
</div>

<?php 
    get_footer(); 
?>