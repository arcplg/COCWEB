<?php
/*
* Template Name: Careers page
*/
get_header();

?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<div class="main-content p-careers">    
    <?php get_template_part('template-parts/careers/banner'); ?>
    <?php get_template_part('template-parts/careers/jobs'); ?>
    <?php get_template_part('template-parts/careers/joinUs'); ?>
</div>

<?php 
    get_footer(); 
?>