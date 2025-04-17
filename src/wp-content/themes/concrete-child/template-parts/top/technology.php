<section class="p-home_technology" id="technology">
<?php if( have_rows('technology_group') ): ?>
    <?php while( have_rows('technology_group') ): the_row(); 
        // Get sub field values.
        $title = get_sub_field('title');
        $posts = get_sub_field('technology_list');
    ?>
    <div class="p-home_group-text">
        <h2><?php echo $title ?></h2>
        <!-- <span>技術</span> -->
    </div>
    <div class="p-home-container">
        <div class="p-home_technology_target">
            <?php foreach($posts as $post_item ){ 
                $title_post = $post_item['title'];
            ?>
                <div class="p-home_technology_target_item">
                    <img src="<?php echo URL_IMAGE; ?>/point.png" alt="point.png">
                    <p class="p-home_technology_target_item_number"></p>
                    <p class="p-home_technology_target_item_introduce"><?php echo $title_post ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

    <div class="p-home_technology_detail">
        <div class="p-home_technology_detail_box">
            <div class="p-home_technology_detail_box_group-text">
                <img src="<?php echo URL_IMAGE; ?>/technologies/text-technology.png" alt="text-technology.png" class="only-pc">
                <img src="<?php echo URL_IMAGE; ?>/technologies/text-technology-sp.png" alt="text-technology.png" class="only-sp">
            </div>
            
            <div class="p-home_technology_detail_box_technologies">
                <div class="p-home_technology_detail_box_technologies_item wow slideInLeft">
                    <img src="<?php echo URL_IMAGE; ?>/technologies/frontend-icon.png" alt="frontend-icon.png">
                    <div class="p-home_technology_detail_box_technologies_item_box">
                        <h3 class="p-home_technology_detail_box_technologies_item_box_title">Frontend</h3>
                        <p>HTML, CSS, SCSS<br />SPA, JavaScript (ES6), TypeScript, Vue JS, Nuxt JS, React JS<br />
                            Gulp, Webpack</p>
                    </div>
                </div>
                <div class="p-home_technology_detail_box_technologies_item wow slideInLeft">
                    <img src="<?php echo URL_IMAGE; ?>/technologies/frontend-icon.png" alt="frontend-icon.png">
                    <div class="p-home_technology_detail_box_technologies_item_box">
                        <h3 class="p-home_technology_detail_box_technologies_item_box_title">Backend</h3>
                        <p>OpenApi (Swagger), Laravel, CakePHP, Ruby on Rails <br />Yii, Python, Django<br />
                            MySQL, mroonga, Elastic Search</p>
                    </div>
                </div>
                <div class="p-home_technology_detail_box_technologies_item wow slideInLeft">
                    <img src="<?php echo URL_IMAGE; ?>/technologies/backend-icon.png" alt="backend-icon.png">
                    <div class="p-home_technology_detail_box_technologies_item_box">
                        <h3 class="p-home_technology_detail_box_technologies_item_box_title">CMS, EC</h3>
                        <p>WordPress, EC-CUBE, CMS</p>
                    </div>
                </div>
                <div class="p-home_technology_detail_box_technologies_item wow slideInLeft">
                    <img src="<?php echo URL_IMAGE; ?>/technologies/frontend-icon.png" alt="frontend-icon.png">
                    <div class="p-home_technology_detail_box_technologies_item_box">
                        <h3 class="p-home_technology_detail_box_technologies_item_box_title">Server</h3>
                        <p>AWS, GCP, Azure, Docker, kerberos</p>
                    </div>
                </div>
                <div class="p-home_technology_detail_box_technologies_item wow slideInLeft">
                    <img src="<?php echo URL_IMAGE; ?>/technologies/frontend-icon.png" alt="frontend-icon.png">
                    <div class="p-home_technology_detail_box_technologies_item_box">
                        <h3 class="p-home_technology_detail_box_technologies_item_box_title">Design Tools</h3>
                        <p>Adobe XD, Photoshop, Illustrator</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="p-home_technology_detail_img-team" style="background-image: url('<?php echo URL_IMAGE; ?>/technologies/bg_team.png');"></div>
        <div class="p-home_technology_detail_img-mobile">
            <!-- <img src="<?php echo URL_IMAGE; ?>/technologies/bg_team_mobile.jpg" alt="point.png"> -->
        </div>
    </div>
    
</section>