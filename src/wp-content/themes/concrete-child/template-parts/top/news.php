<?php
    $args_post = array(
        'post_type'    =>    'post',
        'posts_per_page' => 3
    );
    $q_post = new WP_Query( $args_post );
    $text_news = get_field("text_news");
?>

<section class="p-home_news" id="news">
    <div class="p-home-container">
        <div class="p-home_group-text">
            <h2><?php echo $text_news ?></h2>
            <!-- <span>ニュース</span> -->
        </div>
    </div>

    <?php if( $q_post->have_posts() ): ?>
        <div class="p-home_news_list">
            <?php while( $q_post->have_posts() ) : $q_post->the_post(); ?>
                <div class="p-home_news_list_item wow bounceIn" data-wow-duaration="2s">
                    <div class="p-home_news_list_item_time"><?php echo get_the_date('Y/m/d'); ?></div>
                    <div class="p-home_news_list_item_content">
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>    
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- <a href="" class="more-link">MORE</a> -->
        </div>
    <?php endif; wp_reset_postdata(); ?>   
</section>