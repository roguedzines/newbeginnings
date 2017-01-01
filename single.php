<?php //get theme options
/* Template Name: Blog Template */
?>
<?php get_header(); ?>
<div id="blog-container">
<div class="container clearfix">
		<div id="content" class="grid_7">

<?
//get theme options
global $data;
?>

		
	<?php  if(have_posts()): 
						while (have_posts()) : the_post(); 
						$posts = get_posts($args);?>
<?php
				
						
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
				<?php the_content();  ?>
		</div>
		<?php if ( comments_open() ) : ?>
						<div class="comments-link">
								<?php comments_template( '<span class="leave-reply">' . __( 'Leave a reply', 'saxonTheme' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'saxonTheme' ) ); ?>
						</div>
						<!-- .comments-link -->
						<?php endif; // comments_open() ?>
</div>
			
				<?php endwhile; ?>
			 <?php next_posts_link('Show more posts') ?>
				<?php endif;?>
				<?php wp_reset_query(); ?>
				 
				<?php ?>

</div>
	<div id="sidebar" class="grid_3">
		<?php

get_sidebar();
		?>
		</div>
</div>
</div>

<?php get_footer(); ?>
