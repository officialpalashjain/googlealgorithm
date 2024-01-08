<?php
/**
* Template Name: Blog
*
*/
?>

<?php get_header(); ?>

	<?php

	$initialNumberPosts = 6;
	if (isset($_GET['num_posts'])) {
		$numberPosts = intval($_GET['num_posts']);
	} else {
		$numberPosts = $initialNumberPosts;
	}
	$arr = array(
		'post_type'	=> 'post',
		'numberposts'	=> $numberPosts,
		'orderby'          => 'date',
        'order'            => 'DESC'
	);
	$blogs = get_posts($arr);
	?>
	<div class="blog_page_mainsec">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1>Blog</h1>
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url();?>">Home</a></li>
									<li>Blog</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="blog_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="left_info_sec">
							<div class="title_mainsec">
								<h2>Blog</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					if(!empty($blogs))
					{
						foreach($blogs as $sngl)
						{
							$blog_id = $sngl->ID;
							$permalink = get_permalink($blog_id);
							$blog_title = $sngl->post_title;
							$feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
							$author_name = get_the_author_meta( 'display_name', $sngl->post_author );
							$post_date = $sngl->post_date;
							$post_date = date('F j, Y', strtotime($post_date));
							$author_image = get_avatar($sngl->post_author, 30);
							$excerpt  = custom_excerpt($sngl->post_content);
							$author_link = get_author_posts_url($sngl->post_author);
						?>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<div class="blog_boxsec">
									<div class="img_sec">
										<img src="<?php echo $feature_image; ?>" />
									</div>
									<div class="name_date_sec">
										<span class="name_sec"><span class="admin_icon"><?php echo $author_image;?></span> 
										<a href="<?php echo $author_link; ?>"><?php echo $author_name;?></a></span>
										<span class="date_sec"><span class="calendar_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/img/calendar_icon.png" /></span> <?php echo $post_date;?></span>
									</div>
									<div class="contnt_sec">
										<h5><a href="<?php echo $permalink;?>"><?php echo $blog_title;?></a></h5>
										<p><?php echo $excerpt; ?></p>
										<div class="txt_btn">
											<a class="btn_style" href="<?php echo $permalink;?>">Read More <i class="fa fa-arrow-right hvr-forward"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						
						?>
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 blog_append">
							<div class="btn_mainsec btn_bgstyle">
								<a class="btn_style loadmore_blog" href="javascript:void(0)">Load More</a>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				
			</div>
		</div>
	</div>

<?php get_footer(); ?>
<script type="text/javascript">
var page = 2;
jQuery(document).on('click' , '.loadmore_blog' , function(){
  jQuery('.ajax-loder').show();
  jQuery.ajax({
    type:'POST',
    url: '<?php echo admin_url('admin-ajax.php'); ?>',
    data: {
      action: 'load_blog_ajax',
      'page' : page,
      
    },
    success: function(results){
      if(results.trim() == 'no_post'){
        jQuery('.blog_append').before('<h2 class="sorry_message">Sorry blog not found.</h2>'); 
        jQuery('.loadmore_blog').hide();
        jQuery('.ajax-loder').hide();
      }else{
        jQuery('.ajax-loder').hide();
        jQuery('.blog_append').before(results);
        page++;
      }

    },
    error: function(results) {
      alert('error');
    }
  });
});
</script>