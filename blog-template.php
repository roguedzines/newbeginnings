<?php //get theme options
/* Template Name: Blog Template */
?>
<?php get_header(); ?>
<div id="blog-container">
<div class="container clearfix">
		<div id="content" class="grid_10">

<?
//get theme options
global $data;
?>

		
<?php // get posts

query_posts(array(

'posts_per_page'=>5,
 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
)
);
?>
				<?php if(have_posts()):
				
	while(have_posts()):the_post();
				
						
									$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'mason-img');
									$blog_video = get_post_meta($post->ID,'saxonTheme_blog_video',true);
									$slider_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'mason-img');
         $large_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full-size');
						   $thumbnail_masonry = wp_get_attachment_image_src(get_post_thumbnail_id(),'masonry-image-home');
									$home_image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'home-image-thumb');
									?>
									
<div class="front-subject">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php the_title(); ?>
</div>
<div class="image-wrapper"> <a href="<?php the_permalink('');?>" title="<?php the_title();?>" "<?php post_class();?>"> <img src="<?php echo $thumbnail_masonry[0];?>" width="<?php echo $thumbnail_masonry[1];?> " height="<?php echo $thumbnail_masonry[2];?>"> </a> </div>

<div class="standard-post-wrap">
		<p class="meta">
				<?php _e('Posted', 'saxonTheme'); ?>
				<time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
						<?php the_time(get_option('date_format')); ?>
				</time>
				<?php _e('by', 'saxonTheme'); ?>
				<?php the_author_posts_link(); ?>
				<span class="amp">&amp;</span>
				<?php _e('filed under', 'saxonTheme'); ?>
				<?php the_category(', '); ?>
		</p>
		<div class="singleblogimg-masonry-portfolio">
				<?php the_excerpt();  ?>
		</div>
</div>
			
				<?php endwhile; ?>
			 <?php next_posts_link('Show more posts') ?>
				<?php endif;?>
				<?php wp_reset_query(); ?>
				 
				<?php ?>

</div>
</div>
</div>

<?php get_footer(); ?>
