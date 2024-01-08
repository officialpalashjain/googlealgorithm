<?php
/**
* Template Name: Website SEO Services
*
*/
?>

<?php get_header(); ?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$first_four_boxes = get_custom_field_data('first_four_boxes', $post_id);

	$second_section_text = get_custom_field_data('second_section_text', $post_id);
	$left_right_boxes = get_custom_field_data('left_right_boxes', $post_id);
	
	$third_section_text = get_custom_field_data('third_section_text', $post_id);
	$bottom_boxes = get_custom_field_data('bottom_boxes', $post_id);

	?>

	<div class="website_seo_services_page">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1>Website SEO Services</h1>
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url(); ?>">Home</a></li>
									<li>Website SEO Services</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="top_box_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="box_mainsec">
							<?php
							$html = '';
							if(!empty($first_four_boxes))
							{
								foreach($first_four_boxes as $box)
								{
									$image = $box["image"];
									$title = $box["title"];
									$text = $box["text"];
									$link_text = $box["link_text"];
									$link = $box["link"];
									$html .= '<div class="box_sec">';
										$html .= '<div class="icon_sec">';
											$html .= '<img src="'.$image.'" />';
										$html .= '</div>';
										$html .= '<div class="contnt_sec">';
											$html .= '<h5>'.$title.'</h5>';
											$html .= '<p>'.$text.'</p>';
											$html .= '<div class="txt_btn">';
												$html .= '<a class="btn_style" href="'.$link.'">'.$link_text.' <i class="fa fa-arrow-right hvr-forward"></i></a>';
											$html .= '</div>';
										$html .= '</div>';
									$html .= '</div>';
								}
							}
							echo $html;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="top_contnt_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="inner_contnt_sec">
							<?php echo $second_section_text; ?>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php
		$html = '';
		if(!empty($left_right_boxes))
		{
			$i = 0;
			foreach($left_right_boxes as $box)
			{
				$text = $box['text'];
				$image = $box['image'];	
				$cls = '';
				if($i%2 == 0)
				{
					$cls = 'blue_bgcolor';
				}

				$html .= '<div class="services_mainsec '.$cls.'">';
					$html .= '<div class="container">';
						$html .= '<div class="row">';
							if($cls != '')
							{
								$html .= '<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">';
									$html .= '<div class="right_imgsec">';
										if(!empty($image))
										{
											$html .= '<img src="'.$image.'" alt="" />';
										}
									$html .= '</div>';
								$html .= '</div>';
							}
							$html .= '<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">';
								$html .= '<div class="inner_contnt_sec">';
									$html .= $text;
								$html .= '</div>';
							$html .= '</div>';
							if($cls == '')
							{
								$html .= '<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">';
									$html .= '<div class="right_imgsec">';
										if(!empty($image))
										{
											$html .= '<img src="'.$image.'" alt="" />';
										}
									$html .= '</div>';
								$html .= '</div>';
							}
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
				$i++;
			}
		}
		echo $html;
		?>
		
		<div class="counter_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="top_contnt_sec">
							<p><?php echo $third_section_text; ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="counter_inner_sec">
							<div class="row text-center">
								<?php
								$html = '';
								if(!empty($bottom_boxes))
								{
									foreach($bottom_boxes as $box)
									{
										$image = $box['image'];
										$number = $box['number'];
										$title = $box['title'];
										$html .= '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
											$html .= '<div class="counter">';
												$html .= '<div class="icon_sec">';
													$html .= '<img src="'.$image.'" />';
												$html .= '</div>';
												$html .= '<h2 class="timer count-title count-number" data-to="'.$number.'" data-speed="1500"></h2>';
												$html .= '<p class="count-text ">'.$title.'</p>';
											$html .= '</div>';
										$html .= '</div>';
									}
								}
								echo $html;
								?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
<?php get_footer(); ?>