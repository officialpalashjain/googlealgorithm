<?php get_header();?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$post_title = $post->post_title;
	$post_content = $post->post_content;
	$feature_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	
	$duration = get_custom_field_data('duration', $post_id);
	$work_text = get_custom_field_data('work_text', $post_id);
	$work_image = get_custom_field_data('work_image', $post_id);
	$technology = get_custom_field_data('technology', $post_id);
	$site_results = get_custom_field_data('site_results', $post_id);
	$testimonials = get_custom_field_data('testimonials', $post_id);

	// print_r($testimonials);
	?>
	<div class="about_page_mainsec">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1><?php echo $post_title;?></h1>
							<!-- <h5>Web Design Portfolio</h5> -->
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url();?>">Home</a></li>
									<li>Lorem Ipsum</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="portfolio_details_mainsec">
			<div class="project_introduction_sec">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="left_img_sec">
								<div class="img_sec">
									<img src="<?php echo $feature_image; ?>" />
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="contnt_sec">
								<div class="title_mainsec">
									<h2>Project Introduction</h2>
								</div>
								<div class="project_duration">
									<h6>Duration:<?php echo $duration; ?></h6>
								</div>
								<?php echo $post_content; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="work_performance_mainsec">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="contnt_sec">
								<div class="title_mainsec">
									<h2>OUR WORK</h2>
								</div>
								
								<?php echo $work_text;?>
							</div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="right_img_sec">
								<div class="img_sec">
									<img src="<?php echo $work_image;?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			if(!empty($technology))
			{
			?>
				<div class="technology_stack_mainsec">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="contnt_sec">
									<div class="title_mainsec text-center">
										<h2>Technology Stack We have Worked With</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="technology_show_sec">
									<ul>
										<?php foreach($technology as $tech)
										{
											echo '<li><img src="'.get_stylesheet_directory_uri().'/img/'.$tech.'.png" /></li>';
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			
			<?php
			if(!empty($site_results))
			{
			?>
				<div class="site_result_mainsec">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="contnt_sec">
									<div class="title_mainsec text-center">
										<h2>See Site Result</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="result_mainsec">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Keyword Name</th>
													<th>Page Rank</th>
													<th>Position on Page</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($site_results as $result)
												{
													$keyword_name = $result['keyword_name'];
													$page_rank = $result['page_rank'];
													$position_on_page = $result['position_on_page'];
												?>
													<tr>
														<td><?php echo $keyword_name;?></td>
														<td><?php echo $page_rank;?></td>
														<td><?php echo $position_on_page;?></td>
													</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			
			<?php
			if(!empty($testimonials))
			{
			?>
				<div class="testimonial_mainsec">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="contnt_sec">
									<div class="title_mainsec text-center">
										<h2>Clients Testimonial</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="testimonial_slider">
									<?php
									foreach($testimonials as $testi)
									{
										$review = $testi['review'];
										$client_image = $testi['client_image'];
										$client_name = $testi['client_name'];
										$position = $testi['position'];
										$compony = $testi['compony'];
									?>
										<div>
											<div class="testimonial_boxsec">
												<div class="contnt">
													<p><?php echo $review;?></p>
												</div>
												<div class="profile_mainsec">
													<div class="img_sec">
														<img src="<?php echo $client_image;?>" />
													</div>
													<div class="name_sec">
														<h5><?php echo $client_name;?></h5>
														<span><?php echo $position;?>, <?php echo $compony;?></span>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
	
<?php get_footer();?>