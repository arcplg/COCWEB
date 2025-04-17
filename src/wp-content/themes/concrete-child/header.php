<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<?php if ( get_theme_mod ('sentry-google-tagmanager') != ""){
	get_template_part( 'inc/se-gtm-head');
}  ?>
<?php if ( get_theme_mod ('sentry-google-analytics') != ""){
	get_template_part( 'inc/se-ga');
}  ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no" >
	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.0/animate.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php get_template_part( 'inc/se-ogp' ); ?>
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N8QNRZ6');</script>
	<!-- End Google Tag Manager -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-QYMEJPE35S"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-QYMEJPE35S');
	</script>
	<!-- End Google tag (gtag.js) -->

	</head>
	<body <?php body_class(); ?> id="<?php echo get_locale() ?>">
	<?php get_template_part( 'inc/gtm'); ?>
	<?php if (get_theme_mod ('sentry-google-tagmanager') != ""){
		get_template_part( 'inc/se-gtm-body');
	} ?>
		<header id="header-global" class="global-header bg-transparent header" role="banner">
		<!-- <header class="global-header" role="banner"> -->
			<!-- <div class="global-header-content"> -->
			<div class="logo-concrete">
				<h1>Web System Development</h1>
				<?php if ( get_custom_logo() ): ?>
					<?php the_custom_logo(); ?>
				<?php else: ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<span class="title-text">
						<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
						</span>
					</a>
				<?php endif; ?>
			</div><!-- .logo -->

			<div class="sns-icons optional-nav">
				<?php
				if ( is_active_sidebar( 'se-social-icon' ) ) :
          			dynamic_sidebar( 'se-social-icon' );
                endif;
				?>
			</div>
		<!-- </div> -->
		<!-- .global-header-content -->
			<div class="menu-func_box pc">				
				<nav class="bg-transparent menu-list">
					<ul class='head-menu-items'>
						<?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'depth' => 1, 'theme_location' => 'primary-menu') ); ?>
					</ul>
					<?php if ( !wp_is_mobile() ) : ?>
					<?php endif; ?>
				</nav>
				<div class="menu-func_box_icons">
					<div class="menu-func_box_icons_fb-icon">
						<a href="https://www.facebook.com/Concrete-corp-335023297101897/" target="blank">
							<img src="<?php echo URL_IMAGE; ?>/facebook_icon.png" alt="facebook_icon.png" title="Facebook" width="16" height="16" />
						</a>
					</div>
					<div class="menu-func_box_icons_flag" id="language">
						<div class="wrap-language">
							<li>
								<div id="choosed-language" style="background-image: url('<?php echo get_locale() == "en_US" ? "/wp-content/polylang/en_US.jpg" : "/wp-content/polylang/vi.jpg";  ?>')"></div>
								<div class="arrow-down"></div>
								<div class="triangle"></div>
								<ul class="change-language">
									<?php pll_the_languages(array('show_flags' => 1)); ?>
								</ul>							
							</li>							
						</div>						
					</div>
				</div>
			</div>
							
			<div class="nav-toggle only-sp"></div>			
		</header>

		<div class="mobile-sp off">
			<div class="mobile-sp_close">
				<img src="<?php echo URL_IMAGE; ?>/common/icon_menu_close_sp.png" alt="" />
			</div>
			<ul class="clearfix">
				<?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'depth' => 1, 'theme_location' => 'primary-menu') ); ?>
				<li>
					<div class="changeLang">
						<ul>
							<?php pll_the_languages(array('show_flags' => 1, 'show_names' => 0)); ?>
						</ul>
					</div>
				</li>
			</ul>
		</div>
