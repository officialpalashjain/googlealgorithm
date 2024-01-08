<?php get_header();?>
	
	<?php
	global $post;
	$sngl = '';
	$post_id = $post->ID;
	$post_title = $post->post_title;
	$feature_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	$author_name = get_the_author_meta( 'display_name', $post->post_author );
	$post_date = $post->post_date;
	$post_date = date('F j, Y', strtotime($post_date));
	@$author_image = get_avatar($sngl->post_author, 30);
	update_custom_post_view($post_id);
	$post_view = get_custom_post_view($post_id);
	$post_content = $post->post_content;
	?>
	<div class="blog_page_mainsec blog_details_page_mainsec">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1><?php echo $post_title;?></h1>
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url('blog');?>">Blog</a></li>
									<li>What is Enterprise SEO?</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="blog_mainsec blog_details_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="left_info_sec">
							<div class="title_mainsec">
								<h2><?php echo $post_title;?></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="blog_boxsec">
							<div class="img_sec">
								<img src="<?php echo $feature_image; ?>" />
							</div>
							<div class="name_date_sec">
								<span class="name_sec"><span class="admin_icon"><?php echo $author_image;?></span> <?php echo $author_name;?></span>
								<span class="date_sec"><span class="calendar_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/img/calendar_icon.png" /></span> <?php echo $post_date;?></span>
								<span class="view_sec"><span class="view_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/img/view_icon.png" /></span> <?php echo $post_view;?></span>
								<span class="comment_sec"><span class="comment_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/img/comment_icon.png" /></span> 10</span>
							</div>
							<div class="contnt_sec">
								<?php echo $post_content;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php get_footer();?>