<?php 
    $group_about = get_field("about");
?>
<section class="p-home_about p-home_container">
    <div class="p-home_about_bg" style="background-image: url('<?php echo URL_IMAGE; ?>/about/about-bg.jpg')">
        <div class="p-home_about_bg-about">
            <div class="p-home_about_bg-about_box" id="about">                        
                <div class="p-home_about_bg-about_box_introduce">
                    <?php if( have_rows('about') ): ?>
                        <div class="p-home_about_bg-about_box_introduce_title">
                            <h3 class="p-home_about_bg-about_box_introduce_title-vi"><?php echo $group_about['title'] ?></h3>
                            <!-- <h5 class="p-home_about_bg-about_box_introduce_title-jp wow bounceIn" data-wow-delay="0.4s" data-wow-duaration="3s">会社情報</h5> -->
                        </div>
                        <div class="p-home_about_bg-about_box_introduce_description wow bounceIn" data-wow-delay="0.4s" data-wow-duaration="3s">
                            <?php echo $group_about['description'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>                    
        </div>
    </div>            
</section>