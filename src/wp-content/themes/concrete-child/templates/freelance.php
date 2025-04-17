<?php
/*
* Template Name: Freelance page
*/
get_header();

?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<div class="main-content">
    <div class="p-freelance">
        <?php get_template_part('template-parts/freelance/banner'); ?>
        <div class="main-content_detail p-freelance_detail" id="main_content_detail">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php 
    get_footer(); 
?>