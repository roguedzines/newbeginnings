<?
$args  = array(
'post_type'=>'portfolio',
'numberposts'=>12,
'order'=> 'ASC',
//'meta_key'=> '_thumbnail_id', // with thumbnail
'post_status'=> 'publish',
);
$portfolio = get_posts($args);
?>
<?php if ($portfolio) { ?>
  <ul class="portfolio">
<?php foreach ($portfolio as $post):setup_postdata($post);
									$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'mason-img');
									$main_blog_video = get_post_meta($post->ID,'portfolioTheme_blog_video',true);
									$portfolio_desc = get_post_meta($post->ID,'portfolioTheme_portfolio_desc',true);
									$portfolio_url = get_post_meta($post->ID,'portfolioTheme_portfolio_url',true);
									$slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'slider-front-img');
                  $large_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full-size');
						      $thumbnail_masonry = wp_get_attachment_image_src(get_post_thumbnail_id(),'masonry-image-home');
									$home_image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'home-image-thumb');

?>

    <li>
<div class="portfolio-item">
				<?php if(has_post_thumbnail()){ ?>

      <img src="<?php echo $thumbnail[0];?>" width="<?php echo $thumbnail[1];?>" height="<?php echo $thumbnail[2];?>"/>


<div class="thumb-info">
								<a href="<?php echo $portfolio_url;?>" class="portfolio-thumb" title="<?php the_title();?>">
                  <img src="<?php echo get_stylesheet_directory_uri();?>/images/mouse.png" class="thumb-link"></a>
								<a href="<?php echo $large_image[0];?>" rel="prettyPhoto" class="zoom-in">
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/magnifier.png" class="thumb-link"></a>
              </div>



										<?php } ?>

</div>
<!-- <div class="description-wrap">
<span class="thumb-description-link">More Details</span>
<div class="description"> -->
  <?php //echo $portfolio_desc;?>
  <!-- </div>
</div>
    </li> -->

<?php endforeach;?>

  </ul>


<? } wp_reset_postdata(); ?>
