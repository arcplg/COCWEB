<?php 
    $services = get_field('service_list');
?>
<section class="p-home-container" id="services">
    <div class="p-home_services">   
        <div class="p-home_services_img">
        </div>
        <div class="p-home_services_list">
            <div class="p-home_group-text">
                <h2><?php pll_e('SERVICES') ?></h2>
                <!-- <span>サービス</span> -->
            </div>
            <?php if(have_rows('service_list') ): ?>
                <div class="p-home_services_list_group">
                    <?php while( have_rows('service_list') ): the_row(); 
                        $image = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                    ?>
                        <div class="p-home_services_list_group_item wow fadeInRight" 
                            data-wow-duration="2s">
                            <div>
                                <img src="<?php echo $image; ?>" alt="">
                            </div>
                            <p class="p-home_services_list_group_item_title"><?php echo $title ?></p>
                            <p class="p-home_services_list_group_item_content"><?php echo $description ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <img src="<?php echo URL_IMAGE; ?>/services/world.png" alt="">
        </div>
    </div>
</section>