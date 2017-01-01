<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]--><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'saxonTheme' ), max( $paged, $page ) );

	?>
</title>
 <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />



<!-- Fire up HTML5 IE Queries-->
<!--[if lt IE 9]>   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

  <!--[if lt IE 8]>
    <link rel="stylesheet" href="css/general_foundicons_ie7.css">
  <![endif]-->
<?php

// include custom skin
//include_once(TEMPLATEPATH .'/styles/custom-style.php');
//include_once(TEMPLATEPATH .'/styles/custom-fonts.php');
?>


<?php
// show tracking code

?>
<?php
//run script for threaded comments
if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<?php if (!empty($data['header_tracking_analytics'])){
echo stripslashes($data['header_tracking_analytics']);
}?>

<?
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head(); //header hoook - do not remove this!
?>
	<!-- <link rel="stylesheet" href="css/style.min.css" type="text/css" media="screen"> -->
	<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body <?php body_class();?>>
<div id="to-top"></div>
	<div class="menu">
		<div class="logo-container">
		<div class="container clearfix">

			<div id="logo" class="grid_12">
				<?php if(is_home()){?>
		<a href="#to-top">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/sitelogo.png">
				</a>
				<?php } else { ?>

	<a href="<?php echo bloginfo('siteurl');?>">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/sitelogo.png">
				</a>
				<?php } ?>
			</div>


		</div>
	</div>





	<div class="nav-menu-container">
		<div class="container clearfix">


			<div id="nav" class="grid_12 omega">
				<ul class="navigation">
					<li><a href="#aboutme">About Me</a></li>
					<li><a href="#mywork">My Work</a></li>
					<li><a href="#resume">Resume</a></li>
					<!-- <li><a href="http://roguedzines.com/blog">Blog</a></li> -->
						<li><a href="#contact-me">Contact Me</a></li>


				</ul>
			</div>



</div>
</div>
</div>
