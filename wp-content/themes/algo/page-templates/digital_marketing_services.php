<?php
/**
* Template Name: Digital Marketing Services
*
*/
?>

<?php get_header(); ?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$first_section_image = get_custom_field_data('first_section_image', $post_id);
	$first_section_content = get_custom_field_data('first_section_content', $post_id);

	$left_right_boxes = get_custom_field_data('left_right_boxes', $post_id);

	?>

	<div class="digital_marketing_services_page">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1>Digital Marketing Services</h1>
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url(); ?>">Home</a></li>
									<li>Digital Marketing Services</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="our360_digital_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="right_imgsec">
							<img src="<?php echo $first_section_image;?>" alt="" />
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="contnt_sec">
							<?php echo $first_section_content;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<?php
		if(!empty($left_right_boxes))
		{
			$html = '';
			$clsar = array('', 'smm_mainsec', 'ppc_mainsec', 'smm_mainsec contnt_markting_mainsec');
			foreach($left_right_boxes as $key => $sngl)
			{
				$cls = $clsar[$key];
				$left_side_content = $sngl['left_side_content'];
				$right_side_content = $sngl['right_side_content'];
				// print_r($sngl);
				$html .= '<div class="seo_mainsec '.$cls.'">';
					$html .= '<div class="container">';
						$html .= '<div class="row">';
							$html .= '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
								$html .= '<div class="contnt_sec">';
									$html .= $left_side_content;
								$html .= '</div>';
							$html .= '</div>';
							$html .= '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
								$html .= '<div class="row">';
									if(!empty($right_side_content))
									{
										foreach($right_side_content as $cnt)
										{
											$image = $cnt['image'];
											$title = $cnt['title'];
											$link = $cnt['link'];
											$html .= '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
												$html .= '<div class="category_boxsec">';
													$html .= '<div class="icon_sec">';
														$html .= '<img src="'.$image.'" />';
													$html .= '</div>';
													$html .= '<div class="contnt_sec">';
														$html .= '<h5>'.$title.'</h5>';
														$html .= '<div class="txt_btn">';
															$html .= '<a class="btn_style" href="'.$link.'">See Project <i class="fa fa-arrow-right hvr-forward"></i></a>';
														$html .= '</div>';
													$html .= '</div>';
												$html .= '</div>';
											$html .= '</div>';		
										}
									}
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';		
			}
			echo $html;
		}
		?>
	</div>
	
<?php get_footer(); ?>