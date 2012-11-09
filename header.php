<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php if(!is_front_page()) { echo the_title() . " | "; } ?><?php bloginfo('name'); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />

		<link rel="shortcut icon" href="<?php bloginfo('wpurl'); ?>/favicon.ico" />
		<link rel="apple-touch-icon" href="apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png" />

		<link rel="author" href="https://plus.google.com/106920754534287323693/posts" />

		<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
		wp_register_script('script', get_bloginfo('template_directory') . "/js/script-starter.js");
		wp_register_script('modernizr', get_bloginfo('template_directory') . "/js/modernizr.js");
		wp_enqueue_script('modernizr');
		wp_enqueue_script('jquery');
		wp_enqueue_script('script', false, array(), false, true);
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		wp_head();
?>
	</head>
	<body <?php body_class(); ?> onload="window.scrollTo(0,1);">
	
		<div id="container">
			<header role="banner">
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<nav role="navigation">
					<form id="searchform" action="<?php bloginfo('wpurl'); ?>" method="GET">
						<input type="text" id="search_field" name="s" value="type, hit enter...">
						<button id="search_button">Search</button>
					</form>
						<?php $defaults = array(
						  'theme_location'  => 'primary',
						  'menu'            => 'primary', 
						  'container'       => '', 
						  'echo'            => true,
						  'fallback_cb'     => 'wp_page_menu',
						  'depth'           => 0);
						?>

						<?php wp_nav_menu( $defaults ); ?> 
						
					<!--<ul>
						<li><a href="">about</a></li>
						<li><a href="">projects</a></li>
						<li><a href="">contact</a></li>
					</ul>-->
				</nav>
			</header>
			<div id="main" role="main">
