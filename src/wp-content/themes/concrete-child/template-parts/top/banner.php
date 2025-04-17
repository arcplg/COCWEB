<?php 
    $text_big_slider = get_field('text_big_slider');
    $text_big_slider_strong = get_field('text_big_slider_strong');
    $text_small_slider = get_field('text_small_slider');
?>
<section class="p-home_banner">
    <div class="p-home_banner_background" id="banner-concrete"></div>
    <div class="p-home_banner_group-text">
        <div class="p-home_banner_group-text_text-connect wow slideInLeft" data-wow-duration="2s">
            <p><?php echo $text_big_slider ?></p> 
            <p class="p-home_banner_group-text_text-connect_text-ar-the-world"><?php echo $text_big_slider_strong ?></p>
        </div>
        <div class="p-home_banner_group-text_desc wow slideInRight" data-wow-duration="2s">
            <?php echo $text_small_slider ?>
        </div>
    </div>
</section>