<?php get_header();?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$post_title = $post->post_title;
	$post_content = $post->post_content;
	?>
	<div class="about_page_mainsec">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1><?php echo $post_title;?></h1>
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url();?>">Home</a></li>
									<li><?php echo $post_title;?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="about_contnt_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="contnt_sec">
							<?php echo $post_content;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php get_footer();?>