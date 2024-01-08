<?php
/**
* Template Name: Search Engine Submission
*
*/
?>

<?php get_header(); ?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$post_title = $post->post_title;

	$first_box_image = get_custom_field_data('first_box_image', $post_id);
	$first_box_title = get_custom_field_data('first_box_title', $post_id);
	$first_box_text = get_custom_field_data('first_box_text', $post_id);

	$second_box_image = get_custom_field_data('second_box_image', $post_id);
	$second_box_title = get_custom_field_data('second_box_title', $post_id);
	$second_box_text = get_custom_field_data('second_box_text', $post_id);
	
	$order_now_link = get_custom_field_data('order_now_link', $post_id);
	$email_us_link = get_custom_field_data('email_us_link', $post_id);


	?>


	<div class="seo_tools_page_mainsec">
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
		
		<div class="seo_tools_topsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="top_contnt_sec text-center">
							<div class="title_mainsec" data-aos="zoom-in">
								<h2>Free Search Engine Submission Tool</h2>
							</div>
							<p data-aos="zoom-in">SUBMIT YOUR SITE NOW TO GET INDEX ON GOOGLE AND OTHER SEARCH ENGINES</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<!-- <div class="form_mainsec" data-aos="zoom-in">
							<form>
								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Domain">
										</div>
									</div>
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Email">
										</div>
									</div>
									
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="btn_bgstyle btn_arrow_style text-center">
											<button class="btn_style" type="submit">Submit <i class="fas fa-arrow-right hvr-forward"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div> -->
						<?php
						echo do_shortcode('[contact-form-7 id="118" title="Search Engine Submission"]');
						?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="top_iconbox_sec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="box_mainsec">
							<div class="box_sec" data-aos="zoom-in">
								<div class="icon_sec">
									<img src="<?php echo $first_box_image; ?>">
								</div>
								<div class="contnt_sec">
									<h5><?php echo $first_box_title; ?></h5>
									<p><?php echo $first_box_text; ?></p>
								</div>
							</div>
							<div class="box_sec" data-aos="zoom-in">
								<div class="icon_sec">
									<img src="<?php echo $second_box_image; ?>">
								</div>
								<div class="contnt_sec">
									<h5><?php echo $second_box_title; ?></h5>
									<p><?php echo $second_box_text; ?></p>
								</div>
							</div>
							<div class="box_sec seo_audit_btnsec">
								<div class="contnt_sec">
									<h5 data-aos="zoom-in">Free SEO Audit</h5>
									<div class="btn_bgstyle btn_arrow_style text-center">
										<a data-aos="zoom-in" class="btn_style" href="<?php echo $order_now_link; ?>" type="">Order Now <i class="fa fa-arrow-right hvr-forward"></i></a>
										<a data-aos="zoom-in" class="btn_style" href="mailto:<?php echo $email_us_link; ?>" >Email Us! <i class="fa fa-arrow-right hvr-forward"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
<?php get_footer(); ?>