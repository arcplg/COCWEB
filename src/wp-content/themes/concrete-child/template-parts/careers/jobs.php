<?php 
  $args_post = array(
    'post_type'    =>    'career',
    'posts_per_page' => -1
  );
  $q_post = new WP_Query( $args_post );
  $group_introduce = get_field('group_introduce');

?>

<section class="p-careers_description">
  <div class="container">
    <h2 class="mission">
      <?php echo $group_introduce['title'] ?>
    </h2>

    <div class="concrete-corp">
      <?php echo $group_introduce['description'] ?>
    </div>

    <div class="p-career_jobs_wrapper" id="jobs">
      <h2 class="title"><?php pll_e('job list'); ?></h2>
      <div class="welcome"><?php pll_e('WELCOME TEXT'); ?></div>
      <?php if( $q_post->have_posts() ): ?>
        <div class="job-list accordion">
          <?php while( $q_post->have_posts() ) : $q_post->the_post(); 
              $group_description = get_field('group_description');
              $group_required = get_field('group_required');
              $skill_prioritize = get_field('skill_prioritize');
              $group_working_time = get_field('group_working_time');
              $group_benefit = get_field('group_benefit');
          ?>
            <div class="job-list_item panel">
              <div class="job-title-wrapper accordion-control" data-target="#<?php echo get_post(get_the_ID())->post_name;?>">
                <div class="job-title">
                  <?php the_title(); ?>
                </div>
                <div class="expand-job"></div>
              </div>
              <div class="job-content-wrapper panel-content" id="<?php echo get_post(get_the_ID())->post_name;?>">
                <div class="job-content">
                  <p><?php echo $group_description['text_introduce'] ?><br>
                  <span class="salary"><?php pll_e('salary') ?>: <?php echo $group_description['salary'] ?>   -  <?php pll_e('deadline') ?>: <?php echo $group_description['text_deadline'] ?></span>
                  </p>
                  <div class="job-description">
                    <ul>
                      <?php foreach($group_description['list_description'] as $desc_item ){ 
                          $title_desc = $desc_item['title'];
                      ?>
                        <li><?php echo $title_desc ?></li>
                      <?php } ?>
                    </ul>
                  </div>
                  <hr>

                  <div class="require-compulsory">
                    <div class="heading"><?php pll_e('require compulsory') ?></div>
                    <ul>
                      <?php foreach($group_required['description'] as $require_item ){ 
                            $title_require = $require_item['text_content'];
                        ?>
                        <li><?php echo $title_require ?></li>
                      <?php } ?>
                    </ul>
                  </div>
                  <hr>

                  <div class="skill-prioritize">
                    <div class="heading">
                      <?php pll_e('skill priority'); ?>
                    </div>
                    <ul>
                      <?php foreach($skill_prioritize['list_skill_require'] as $skill_item ){ 
                          $title_skill = $skill_item['title'];
                      ?>
                        <li><?php echo $title_skill ?></li>
                      <?php } ?>
                    </ul>
                  </div>
                  <hr>

                  <div class="benefit">
                    <div class="heading">
                      <?php pll_e('benefit'); ?>
                    </div>
                    <ul>
                      <?php foreach($group_benefit['list_benefit'] as $benefit_item ){ 
                          $title_benefit = $benefit_item['title'];
                      ?>
                        <li><?php echo $title_benefit ?></li>
                      <?php } ?>
                    </ul>
                  </div>
                  <hr>

                  <div class="time-work">
                    <div class="heading">
                      <?php pll_e('working time'); ?>
                    </div>
                    <ul>
                      <?php 
                        $time_work = $group_working_time['time_work'];
                        $breaking_work = $group_working_time['breaking_work'];
                      ?>
                      <li><?php echo $time_work['title'] ?>: <?php echo $time_work['time'] ?></li>
                      <?php ?>
                      <li>
                        <p><?php echo $breaking_work['title'] ?>: <?php echo $breaking_work['time'] ?></p>
                      </li>
                    </ul>
                  </div>
                  
                  <button class="applyBtn" type="button"><?php echo (get_locale() == "vi") ? "ỨNG TUYỂN" : "APPLY NOW" ?></button>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; wp_reset_postdata(); ?>   

    </div>
  </div>
  <div class="bg-job-list">
  </div>
</section>

