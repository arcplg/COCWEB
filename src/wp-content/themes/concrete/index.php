<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package concrete
 */

get_header();
?>

	<main id="primary" class="site-main">

	<section id='mv' class="mv">
		<div class='mv_content'>
			<div class='mv_content_txt'>
			<h2 class='mv_title'>
				We are Shopify Concrete
				<br>
				<span id='typed_1' class='tyled_text'>
					<span class='theme_blue'>Your Success Partners!</span>
				</span>
				<span class='typed-cursor'>|</span>
			</h2>
			<p class='mv_des'>Create Teams That Make Use Of Their Specialty Areas....</p>
		</div>
		<div class='mv_img_icon'>
			<div class='mv_img_01 animate-fade-up mv_img_effect_move'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images/mv/mv_img1-1.jpg" alt="MV images">
			</div>
			<div class='mv_img_02 animate-fade-left mv_img_effect_move'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images/mv/mv_img1-2.jpg" alt="MV images">
			</div>
			<div class='mv_img_03 animate-fade-up '>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images/mv/m_banner.png" alt="MV images">
			</div>
			<div class='mv_img_04 animate-fade-right mv_img_effect_move'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images//mv/mv_img1-4.jpg" alt="MV images">
			</div>
			<div class='mv_img_05 animate-fade-up mv_img_effect_move'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images//mv/mv_img1-5.jpg" alt="MV images">
			</div>
			<div class='mv_img_06 mv_img_effect_move2'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images//mv/mv_img1-6.png" alt="MV images">
			</div>
			<div class='mv_img_07 mv_img_effect_move2'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images//mv/mv_img1-7.png" alt="MV images">
			</div>
			<div class='mv_img_08 mv_img_effect_move2'>
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/concrete/images//mv/mv_img1-8.png" alt="MV images">
			</div>
			</div>
		</div>
		</section>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();

