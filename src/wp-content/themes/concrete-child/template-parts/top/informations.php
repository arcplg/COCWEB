<?php 
    $group_information = get_field("our_informations");
    $infos = $group_information['table_information'];
?>  
<section class="p-home_informations">
    <?php if( have_rows('our_informations') ): ?>
        <div class="p-home_group-text">
            <h2><?php echo $group_information['title'] ?></h2>
            <!-- <span>会社概要</span> -->
        </div>
        <div class="container">
            <div class="p-home_informations_info">
                <?php foreach($infos as $info_item ){ 
                    $label = $info_item['label'];
                    $value = $info_item['value'];
                    // echo $post_item;
                ?>
                    <div class="p-home_informations_info_item">
                        <div class="p-home_informations_info_item_label wow slideInLeft" data-wow-duaration="20s" data-wow-delay="0.2s">
                            <?php echo $label?>
                        </div>
                        <div class="p-home_informations_info_item_value wow slideInRight" data-wow-duaration="20s" data-wow-delay="0.2s">
                            <?php echo $value?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
</section>