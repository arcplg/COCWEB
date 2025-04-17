<?php 
    $group_member = get_field("group_member");
?>
<?php if( have_rows('about') ): ?>
    <section class="p-home_members">
        <div class="p-home_group-text">
            <h2><?php echo $group_member['title'] ?></h2>
            <!-- <span>メンバー</span> -->
        </div>
        <div class="p-home_members_list">
            <div class="p-home_members_slider-members_thumbnail" id="slider-members">
            <?php foreach($group_member['list_member'] as $member ){ 
                // Get sub field values.
                $member_name = $member['name'];
                $member_position = $member['position'];
                $member_url = $member['url'];
            ?>
                <div class="p-home_members_slider-members_thumbnail_item wow bounceIn" data-wow-delay="0.3s" data-wow-duaration="3s">
                    <span class="p-home_members_slider-members_thumbnail_item_bg-before"></span>
                    <span class="p-home_members_slider-members_thumbnail_item_bg-after"></span>
                    <a href="/" onclick="event.preventDefault()">
                        <img src="<?php echo $member_url; ?>" alt="itami.png">
                    </a>
                    <div class="p-home_members_slider-members_thumbnail_item_info">
                        <h3><?php echo $member_name ?></h3>
                        <p><?php echo $member_position ?></p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="p-home_members_btn">
            <a href="#contact" class="btn_meet-our-team"><?php pll_e('MEET OUR TEAM') ?></a>
        </div>
    </section>
<?php endif; ?>   