<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package concrete
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="header" class="l-header">
		<div class="container">
			<div class="l-header_content">
				<div class="l-header_logo">
				<?php the_custom_logo(); ?>
				</div>
				<div class="l-header_right">
					<div class="nav_menu">
						<div class="l-header_nav">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'concrete' ); ?></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'	 => 'menu_pc',
								)
							);
							?>
						</div>
						
						<div class="language">
							<div class="language_vn">VN
								<ul class="language_list">
									<li>
										<a href="#">VN</a>
									</li>
									<li>
										<a href="#">En</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- #site-navigation -->
			</div>
		</div>
		
	</header><!-- #masthead -->
