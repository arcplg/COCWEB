<?php
  $args_position = array(
    'post_type'    =>    'career',
  );
  $q_position = new WP_Query( $args_position );
?>

<section class="p-careers_join-us">
  <div class="container">
    <div class="join-us-wrapper">
      <div class="join-us_form">
        <h2 class="title"><?php pll_e('JOIN US'); ?></h2>
        <div class="welcome"><?php pll_e('WELCOME TEXT'); ?></div>
        <form action="<?php echo get_stylesheet_directory_uri() ?>/process_upload.php" method="POST">
          <div class="file-wrapper wrapper">
            <input type="file" name="file-cv" id="fileCV" placeholder="<?php pll_e('UPLOAD YOUR CV'); ?>" /><br />
            <label for="file-group">
              <img src="<?php echo URL_IMAGE; ?>/careers/upload-icon.svg" alt="upload-icon.svg">
              <span><?php pll_e('UPLOAD YOUR CV'); ?></span>
            </label>
          </div>
          <span class="required"></span>
          <div class="wrapper">
            <input type="text" placeholder="<?php pll_e('YOUR NAME'); ?>" name="candidate" id="candidate" autocomplete="off" /><br />
          </div>
          <span class="required"></span>
          <div class="select-wrapper wrapper">
            <select name="positionId" id="positionId">
              <option value=""><?php pll_e('POSITION'); ?></option>
              <?php if( $q_position->have_posts() ): ?>
                <?php while( $q_position->have_posts() ) : $q_position->the_post(); ?>
                  <option value="<?php echo get_the_ID() ?>"><?php the_title()?></option>
                <?php endwhile; ?>
              <?php endif; wp_reset_postdata(); ?>   
            </select>
          </div>
          <span class="required"></span>
          <div class="btn-submit_wrapper">
            <input type="submit" id="apply-cv" value="<?php pll_e('SUBMIT'); ?>" />
            <span class="icon-loader" id="loading"></span>            
          </div>          
          <div class="join-us_form_notice" id="join-us_form_notice"><?php pll_e('thank you sent'); ?></div>
          <div class="join-us_form_notice error" id="join-us_form_notice-error"><?php pll_e('form have error'); ?></div>
        </form>
      </div>
      <div class="map">
        <img src="<?php echo URL_IMAGE; ?>/careers/map.jpg" alt="map.jpg">
      </div>
    </div>

    <div class="img-join-us">
      <img src="<?php echo URL_IMAGE; ?>/careers/bg-joinUs.jpg" alt="bg-joinUs.jpg">
    </div>
  </div>
</section>