<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to extend the class to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value instead of boolean as before
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */



/********************* END EXTENDING CLASS ***********************/

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it
$prefix = 'portfolioTheme_';

$stalkerTheme_meta_boxes = array();

// first meta box
$stalkerTheme_meta_boxes[] = array(
	'id' => 'portfolio_meta',							// meta box id, unique per meta box
	'title' => __('Portfolio Options','Saxon'),			// meta box title
	'pages' => array('portfolio'),	// post types, accept custom post types as well, default is array('post'); optional

	'fields' => array(							// list of meta fields
//										array(
//			'name' => __('Slide Title','Saxon'),
//			'desc' => __('Enter a title for the slide!'),	// field description, optional
//			'id' => $prefix . 'slides_title',
//			'type' => 'text',						// date
//			'std' => ''					// date format, default yy-mm-dd. Optional. See more formats here: http://goo.gl/po8vf
//			),
										array(
			'name' => __('Portfolio Item Description','Saxon'),
			'desc' => __('Enter a description for the item'),	// field description, optional
			'id' => $prefix . 'portfolio_desc',
			'type' => 'textarea',						// date
			'std' => ''					// date format, default yy-mm-dd. Optional. See more formats here: http://goo.gl/po8vf
			),
		array(
			'name' => __('Portfolio Item URL','Saxon'),
			'desc' => __('Enter a URL for the portfolio item'),	// field description, optional
			'id' => $prefix . 'portfolio_url',
			'type' => 'text',						// date
			'std' => ''					// date format, default yy-mm-dd. Optional. See more formats here: http://goo.gl/po8vf
			),
	));
	// box for secondary content
	

$stalkerTheme_meta_boxes[] = array(
	'id' => 'gallery_meta_desc',
	'title' => 'Description',
	'pages' => array('gallery','featured slides'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
			array(
				'name' => 'Slide description',
				'desc' => 'Enter your mini description for this slide.',
				'id' => $prefix . 'slide_desc',
				'type' => 'textarea',
				'std' => ''
			),
		)
);


$stalkerTheme_meta_boxes[] = array(
	'id' => 'blog_meta_video',
	'title' => 'Blog Video Options',
	'pages' => array('post','page','slides','featured slides','projects','featured_video'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
			array(
				'name' => 'Video Embed Code',
				'desc' => 'Enter the embed code for your video.',
				'id' => $prefix . 'blog_video',
				'type' => 'textarea',
				'std' => ''
			),
		)
);


/********************* END DEFINITION OF META BOXES ***********************/
/********************* META BOX REGISTERING ***********************/

/********************* META FOREACH ***********************/
foreach ($stalkerTheme_meta_boxes as $meta_box) {
	new stalkerTheme_meta_box($meta_box);
}
/********************* META FOREACH END ***********************/
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
//add_action( 'admin_init', 'stalkerTheme_register_meta_boxes' );


?>
