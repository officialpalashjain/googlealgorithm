<?php
/**
* Template Name: Bulk CMS Detector
*
*/
?>

<?php get_header(); ?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$post_title = $post->post_title;

	$first_section_title = get_custom_field_data('first_section_title', $post_id);
	$first_section_content = get_custom_field_data('first_section_content', $post_id);

	$second_section_content = get_custom_field_data('second_section_content', $post_id);

	?>


	<div class="bulk_tool_page_mainsec">
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
		
		<div class="bulk_tool_topsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="top_contnt_sec text-center">
							<div class="title_mainsec">
								<h2><?php echo $first_section_title;?></h2>
							</div>
							<p><?php echo $first_section_content;?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="bulk_tool_contnt_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="contnt_sec">
							<?php echo $second_section_content;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
<?php get_footer(); ?>