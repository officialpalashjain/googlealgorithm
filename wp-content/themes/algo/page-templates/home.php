<?php
/**
* Template Name: Home
*
*/
?>

<?php get_header(); ?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$banner_title = get_custom_field_data('banner_title', $post_id);
	$left_button_text = get_custom_field_data('left_button_text', $post_id);
	$left_button_link = get_custom_field_data('left_button_link', $post_id);
	$right_button_text = get_custom_field_data('right_button_text', $post_id);
	$right_button_link = get_custom_field_data('right_button_link', $post_id);
	$banner_image = get_custom_field_data('banner_image', $post_id);

	$first_section_title = get_custom_field_data('first_section_title', $post_id);
	$first_section_content = get_custom_field_data('first_section_content', $post_id);
	$second_section_title = get_custom_field_data('second_section_title', $post_id);
	$second_section_content = get_custom_field_data('second_section_content', $post_id);

	$work_box_sections = get_custom_field_data('work_box_sections', $post_id);

	$google_algorithm_section_title = get_custom_field_data('google_algorithm_section_title', $post_id);
	$google_algorithm_section_content = get_custom_field_data('google_algorithm_section_content', $post_id);

	$algorithm_second_section_title = get_custom_field_data('algorithm_second_section_title', $post_id);
	$algorithm_second_section_left_content = get_custom_field_data('algorithm_second_section_left_content', $post_id);
	$algorithm_second_section_right_image = get_custom_field_data('algorithm_second_section_right_image', $post_id);

	$video_url = get_custom_field_data('video_url', $post_id);
	$video_thumbnail = get_custom_field_data('video_thumbnail', $post_id);

	$arr = array(
		'post_type'	=> 'post',
		'numberposts'	=> 6,
		'orderby'          => 'date',
        'order'            => 'DESC'
	);
	$blogs = get_posts($arr);
	?>
	<div class="home_banner_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="banner_contnt_sec">
						<h1><?php echo $banner_title;?></h1>
						<div class="btn_bgstyle">
							<a class="btn_style" href="<?php echo $left_button_link?>"><?php echo $left_button_text;?></a>
							<a class="border_btn_style" href="<?php echo $right_button_link?>"><div class="btn_border"><?php echo $right_button_text;?></div></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="bottom_bigimg">
						<img src="<?php echo $banner_image;?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="what_google_algorithm_sec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="contnt_mainsec">
						<div class="title_mainsec">
							<h2><?php echo $first_section_title;?></h2>
						</div>
						<div class="contnt_sec">
							<?php echo $first_section_content;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="what_google_algorithm_sec algorithm_update_work">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="contnt_mainsec">
						<div class="title_mainsec">
							<h2><?php echo $second_section_title;?></h2>
						</div>
						<div class="contnt_sec">
							<?php echo $second_section_content;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="update_work_boxsec">
		<div class="container">
			<div class="row">
				<?php
				if(!empty($work_box_sections))
				{
					$html = '';
					foreach ($work_box_sections as $key => $value)
					{
						$image = $value['image'];
						$title = $value['title'];
						$description = $value['description'];
						$button_text = $value['button_text'];
						$button_link = $value['button_link'];
						$html .= '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
							$html .= '<div class="box_mainsec">';
								$html .= '<div class="icon_sec">';
									$html .= '<img class="hvr-grow" src="'.$image.'" />';
								$html .= '</div>';
								$html .= '<div class="title_sec">';
								$html .= '<h4>'.$title.'</h4>';
							$html .= '</div>';
							$html .= '<div class="contnt_sec">';
								$html .= '<p>'.$description.'</p>';
							$html .= '</div>';
							$html .= '<div class="txt_btn">';
								$html .= '<a class="btn_style" href="'.$button_link.'">'.$button_text.'<i class="fa fa-arrow-right hvr-forward"></i></a>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					}
					echo $html;
				}
				?>
			</div>
		</div>
	</div>
	
	<div class="google_algorithm_seo_sec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="contnt_mainsec">
						<div class="title_mainsec">
							<h2><?php echo $google_algorithm_section_title; ?></h2>
						</div>
						<div class="contnt_sec">
							<p><?php echo $google_algorithm_section_content; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="algorithm_search_txtsec">
						<div class="title_mainsec">
							<h2><?php echo $algorithm_second_section_title; ?></h2>
						</div>
						<div class="point_boxsec">
							<div class="row">
								<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
									<div class="left_point_sec">
										<?php echo $algorithm_second_section_left_content;?>
									</div>
								</div>
								<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<div class="right_imgsec hvr-bob">
										<img src="<?php echo $algorithm_second_section_right_image;?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="video_box_mainsec">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="video_sec">
						<a class="" data-fancybox="gallery_web" href="<?php echo $video_url;?>">
							<img src="https://googlealgorithm.com/wp-content/uploads/2022/05/play_icon.png" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="latest_news_blog_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="title_mainsec">
						<h2>Google Algorithm News & Latest Blogs</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				if(!empty($blogs))
				{
					$html = '';
					foreach($blogs as $sngl)
					{
						$blog_id = $sngl->ID;
						$permalink = get_permalink($blog_id);
						$blog_title = $sngl->post_title;
						$feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
						$author_name = get_the_author_meta( 'display_name', $sngl->post_author );
						$post_date = $sngl->post_date;
						$post_date = date('F j, Y', strtotime($post_date));

						$html .= '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
							$html .= '<a href="'.$permalink.'">';
								$html .= '<div class="box_mainsec">';
									$html .= '<div class="img_sec">';
										$html .= '<img src="'.$feature_image.'" />';
									$html .= '</div>';
									$html .= '<div class="contnt_sec">';
										$html .= '<h5>'.$blog_title.'</h5>';
										$html .= '<div class="name_date_sec">';
											$html .= '<span class="name_sec">'.$author_name.'&nbsp;</span>';
											$html .= '<span class="date_sec">'.$post_date.'</span>';
										$html .= '</div>';
									$html .= '</div>';
								$html .= '</div>';
							$html .= '</a>';
						$html .= '</div>';
					}
					echo $html;
				}
				?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>