<?
# Theme Functions for NewBeginnings Theme

require('functions/meta/meta-box-class.php');
require('functions/meta/meta-box-usage.php');




// Thumbnail sizes
if (function_exists('add_theme_support')){
add_theme_support('post-thumbnails');
add_theme_support('custom-header',$args);
add_theme_support('automatic-feed-links');
add_editor_style('custom-editor-style.css');
add_theme_support('custom-background',$args);




set_post_thumbnail_size(120,80);
add_image_size('full-size', 9999,9999);
add_image_size('front-page-thumb',240,80, true);
add_image_size('slider-image',960,280, true);
add_image_size('posts-image-single',540,220, true);
add_image_size('single-slider-image',540,420, true);
add_image_size('single-image',700,400, true);
add_image_size('single-image-gallery',600,300, true);
add_image_size('slider-video',960,9999, true);
add_image_size('mini-thumb',64,64, true);
add_image_size('column-four', 200, 140, true );
add_image_size('column-three', 320, 140, true );
add_image_size('column-two', 320, 140, true );
add_image_size('portfolio-thumb',280, 210, true ); 
add_image_size('portfolio-image-single',580,470,true);
add_image_size('screen-shot', 720, 540,true ); 
add_image_size('recent-posts-thumb', 48, 48,true); 
add_image_size('gallery-thumb', 100,100,true);
add_image_size('mason-img', 250, 320,true); 
add_image_size('project-img', 300, 200,true); 
add_image_size('nomason-img', 600, 400,true); 
add_image_size('masonry-image-home',320,300,true); 
add_image_size('masonry-image-home-sidebar',340,300,true); 
add_image_size('home-image-thumb',320,320,true);
add_image_size('single-img-slider',650,400,true);
add_image_size('related-post-img',55,55,true);
add_image_size('project-large-img',500,320,true);
add_image_size('slider-front-img',1000,399,true);
add_image_size('featured-mini-thumb',300,200,true);
add_image_size('project-widget-image',300,120,true);
}
if ( !is_admin()){
function load_saxon_scripts() {
global $data;
/************* Queue JS ********************/
//fire up jquery
wp_enqueue_script('jquery');

//load all the necessary scripts
//wp_enqueue_script('stellar',get_template_directory_uri() . '/js/jquery.stellar.min.js',array('jquery'),'1.4.8',true);
wp_enqueue_script('waypoints',get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'),'1.4.8',true);
wp_enqueue_script('easing',get_template_directory_uri() . '/js/jquery.easing.1.3.js',array('jquery'),'1.4.8',true);

//wp_enqueue_script('scripts',get_template_directory_uri() . '/js/scripts.js',array('jquery'),'1.4.8',true);

if(is_home()){
wp_enqueue_script('hoverme',get_template_directory_uri().'/js/jquery.hoverex.min.js',array('jquery'),'1.0',true);
wp_enqueue_script('prettyPhoto',get_template_directory_uri().'/js/jquery.prettyPhoto.js',array('jquery'),'1.0',true);
wp_enqueue_script('slicknav',get_template_directory_uri().'/js/jquery.slicknav.min.js',array('jquery'),'1.0',true);
wp_enqueue_script('jqueryscrollto','//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.14/jquery.scrollTo.min.js',array('jquery'),'1.0',true);
wp_enqueue_script('modernizr','http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js',array('jquery'),'1.0',true);
wp_enqueue_script('custominit',get_template_directory_uri().'/js/custom.js',array('jquery'),'1.0',true);
wp_enqueue_script('myscrollto',get_template_directory_uri().'/js/myscrollto.js',array('jquery'),'1.0',true);
}

}
}




add_action('wp_enqueue_scripts','load_saxon_scripts');

// Load stylesheets

function load_saxon_themecss(){
	global $data;
if (!is_admin()) {
	//load necessary style sheets
	// load all necessary stylesheets
	wp_enqueue_style('hovermecss',get_template_directory_uri().'/css/hoverex-all.css');
wp_enqueue_style('grid',get_template_directory_uri().'/css/grid.css');
wp_enqueue_style('prettyphoto',get_template_directory_uri().'/css/prettyPhoto.css');
wp_enqueue_style('portfolio',get_template_directory_uri().'/css/portfolio.css');
wp_enqueue_style('responsive',get_template_directory_uri().'/css/responsive.css');
}
}



// fire up stylesheets on load
add_action('wp_print_styles','load_saxon_themecss');

add_action( 'init', 'create_post_types' );
function create_post_types() {	
register_post_type('portfolio',
array(
'labels' => array(
'name' => __( 'Portfolio','post type general name' ),
'singular_name' => __( 'Portfolio','post type singular name' ),
'add_new' => __( 'Add New Portfolio Item'),
'add_new_item' => __( 'Add New Portfolio Item' ),
'edit_item' => __( 'Edit Portfolio Item' ),
'new_item' => __( 'New Portfolio Item' ),
'view_item' => __( 'View Portfolio Item' ),
'search_items' => __( 'Search Portfolio Item' ),
'not_found' => __( 'NoPortfolio Item found' ),
'not_found_in_trash' => __( 'No Portfolio Item found in trash' ),

),
'public' => true,
'supports' => array('title','thumbnail'),
'query_var' => true,
'hierarchical'=>false,
'rewrite' => array( 'slug' => 'portfolio' )
));
}



//number of posts per page for taxonomy
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
global $option_posts_per_page;
global $options;
//get posts per page option from admin
if($options['archive_posts_per_page'] != '') {
$portfolio_posts_per_page = $options['portfolio_posts_per_page'];
} else { $portfolio_posts_per_page = '-1'; }

if ( is_tax() ) {
return $portfolio_posts_per_page;
} else {
return $option_posts_per_page;
}
}


// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
$wp_rewrite->flush_rules();
}
?>