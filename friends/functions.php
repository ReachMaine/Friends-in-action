<?php
/*
require_once(get_stylesheet_directory().'/custom/woocommerce.php');
require_once(get_stylesheet_directory().'/custom/language.php'); */

	/***** change admin favicon *****/
	/* add favicons for admin */
	/*add_action('login_head', 'add_favicon');
	add_action('admin_head', 'add_favicon');

	function add_favicon() {
		$favicon_url = get_stylesheet_directory_uri() . '/images/admin-favicon.ico';
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	} */

	/***** end admin favicon *****/
	/*****  change the login screen logo ****/
	/* size should be somewhere around 300 x 60 */
	function my_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/admin-login-logo.png);
				padding-bottom: 30px;
				background-size: contain;
				margin-left: 0px;
				margin-bottom: 0px;
				margin-right: 0px;
				height: 60px;
				width: 100%;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	/*****  end custom login screen logo ****/

	add_action('after_setup_theme', 'rEAch_setup');
	/**  ea_setup
	*  init stuff that we have to init after the main theme is setup.
	*
	*/
	function rEAch_setup() {
	 /* do stuff here. */
	}

	// filter to wrap embedded videos (youtube) in div ss.t. we can style it
	add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);
	function wrap_embed_with_div($html, $url, $attr) {
	        return '<div class="ea-responsive-container">'.$html.'</div>';
	}

	/* add menu location */
	function register_top_menu() {
	  	register_nav_menu('top-menu',__( 'Top Bar Menu' ));
	}
	add_action( 'init', 'register_top_menu' );

/* add widget area in header (right of logo) */
if ( function_exists('register_sidebar') ){
		// Banner Ad
		 register_sidebar(array(
				'name' => 'Header Widget',
				'id' => 'header-widget',
				'description' => 'Right of Logo',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3><div class="tx-div small"></div>',
		));
	} //function_exists('register_sidebar')
?>
