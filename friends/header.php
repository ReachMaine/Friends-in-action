<!DOCTYPE html><!-- HTML 5 -->
<?php /*
	10Nov16 zig:  - add gtm code.
								- add top-bar menu abover header
	15Nov16 TimS - add google font Montserrat
	16Nov16 zig: - add widget area after logo in header.
*/ ?>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<?php /* Embeds HTML5shiv to support HTML5 elements in older IE versions. */ ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<?php themezee_wrapper_before(); // hook before #wrapper ?>
<div id="wrapper" class="hfeed">
	<div id="top-bar" class="clearfix">
		<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
	</div>
	<?php themezee_header_before(); // hook before #header ?>
	<header id="header" class="clearfix" role="banner">

		<div id="logo">

			<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<?php // Display Logo Image or Site Title
			$options = get_option('zeetasty_options');
			if ( isset($options['themeZee_general_logo']) and $options['themeZee_general_logo'] <> "" ) : ?>
				<img class="logo-image" src="<?php echo esc_url($options['themeZee_general_logo']); ?>" alt="Logo" /></a>
		<?php else: ?>
				<h1 class="site-title"><?php bloginfo('name'); ?></h1>
		<?php endif; ?>
			</a>

		<?php if(isset($options['themeZee_general_tagline']) and $options['themeZee_general_tagline'] == 'true') : ?>
			<h2 class="site-description"><?php echo bloginfo('description'); ?></h2>
		<?php endif; ?>

		</div>
		<div id="header-widget-area">
			<?php if ( is_active_sidebar( 'header-widget') ) {
				dynamic_sidebar( 'header-widget' );
			}  ?>
		</div>
	</header>
	<?php themezee_header_after(); // hook after #header ?>

	<nav id="mainnav" class="clearfix" role="navigation">
		<div id="mainnav-border"></div>
			<?php
			// Get Navigation out of Theme Options
				wp_nav_menu(array('theme_location' => 'main_navi', 'container' => false, 'menu_id' => 'mainnav-menu', 'echo' => true, 'fallback_cb' => 'themezee_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
			?>
	</nav>
	<div id="mainnav-bg-wrap"><div id="mainnav-bg"></div></div>

	<?php // Display Custom Header Image
		themezee_display_custom_header(); ?>
