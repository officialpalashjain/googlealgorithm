<?php
/**
* Template Name: Submit Article
*
*/
?>

<?php get_header(); ?>
	
	<?php
	global $post;
	$post_id = $post->ID;
	$post_title = $post->post_title;

	$first_section_content = get_custom_field_data('first_section_content', $post_id);
	$second_section_image = get_custom_field_data('second_section_image', $post_id);
	$second_section_content = get_custom_field_data('second_section_content', $post_id);

	$third_section_boxes = get_custom_field_data('third_section_boxes', $post_id);
	// $second_box_title = get_custom_field_data('second_box_title', $post_id);
	// $second_box_text = get_custom_field_data('second_box_text', $post_id);
	
	// $order_now_link = get_custom_field_data('order_now_link', $post_id);
	// $email_us_link = get_custom_field_data('email_us_link', $post_id);
	?>

	<?php
	$flag = '';
	if(isset($_POST['hdnsbmt']))
	{	
		$username = $_POST['username'];
	     $password = '';
	     $email = $_POST['useremail'];

	     if ( !username_exists($username) && !email_exists($email) ) {
	        $user_id = wp_create_user($username, $password, $email);
	        $wp_user = new WP_User($user_id);
	        // $wp_user->set_role('administrator');
	     }
	     else {
	     	$user_id = email_exists($email);
	     }
	     
		$param = array();
		$param['post_title'] = $_POST['post_title'];
		$param['post_content'] = $_POST['post_content'];
		$param['post_status'] = 'pending';
		$param['post_author'] = $user_id;
		if(!empty($_POST['post_category']))
		{
			$param['post_category'] = $_POST['post_category'];
		}
		$param['tags_input'] = $_POST['tags_input'];

		$post_id = wp_insert_post($param);

		if( $_FILES['feature_image']['size'] != 0 )
		{
			$uploaddir = wp_upload_dir();
			$file = $_FILES["feature_image"]["name"];
			$uploadfile = $uploaddir['path'] . '/' . basename( $file );

			move_uploaded_file( $_FILES["feature_image"]["tmp_name"] , $uploadfile );
			$filename = basename( $uploadfile );

			$wp_filetype = wp_check_filetype(basename($filename), null );

			$attachment = array(
			    'post_mime_type' => $wp_filetype['type'],
			    'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
			    'post_content' => '',
			    'post_status' => 'inherit',
			    /*'menu_order' => $_i + 1000*/
			);
			$attach_id = wp_insert_attachment( $attachment, $uploadfile );
			set_post_thumbnail( $post_id, $attach_id ); 
		}
		$flag = 'success';
	}
	?>


	<div class="submit_article_pagesec">
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
		
		<div class="top_contnt_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="contnt_sec">
							<?php echo $first_section_content; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="img_contnt_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="img_sec">
							<img src="<?php echo $second_section_image?>" />
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="contnt_sec">
							<?php echo $second_section_content;?>
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
							if(!empty($third_section_boxes))
							{
								foreach($third_section_boxes as $box)
								{
									$image = $box['image'];
									$title = $box['title'];
									$text = $box['text'];

									$html .= '<div class="box_sec">';
										$html .= '<div class="icon_sec">';
											$html .= '<img src="'.$image.'">';
										$html .= '</div>';
										$html .= '<div class="contnt_sec">';
											$html .= '<h5>'.$title.'</h5>';
											$html .= '<p>'.$text.'</p>';
										$html .= '</div>';
									$html .= '</div>';
								}
							}
							echo $html;
							?>
						</div>
						<div class="btn_bgstyle btn_arrow_style text-center">
							<a href="<?php echo site_url().'/blog';?>" class="btn_style" >View Guest Blogs <i class="fa fa-arrow-right hvr-forward"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
		if(!empty($flag))
		{
			echo '<h4>Your Article has been subitted for approval.</h4>';
		}
		?>

		<div class="guest_article_formsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
					    
						<div class="title_mainsec">
							<h2>Submit a Guest Article Here for Instant Approval</h2>
							
						</div>
						
						<div class="form_sec">
							<form method="post" enctype="multipart/form-data" onsubmit="return validatearticle();">
								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group">
											<label>Your Name<span class="required_feild">*</span></label>
											<input type="text" class="form-control required" placeholder="Your Name" name="username">
										</div>
									</div>
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group">
											<label>Your Email<span class="required_feild">*</span></label>
											<input type="text" class="form-control required" placeholder="Your Email" name="useremail">
										</div>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group">
											<label>Post Title<span class="required_feild">*</span></label>
											<input type="text" name="post_title" class="form-control required" placeholder="Subject">
										</div>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group">
											<label>Post Content<span class="required_feild">*</span></label>
											<textarea name="post_content" class="form-control" placeholder="Your Message"></textarea>
										</div>
									</div>
									<?php
									$categories = get_categories();
									if(!empty($categories))
									{
									?>
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
											<div class="form-group">
												<label>Category</label>
												<select name="post_category[]" class="form-control" multiple="">
													<?php
													foreach($categories as $cat)
													{
													?>
														<option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name;?></option>
														
													<?php
													}
													?>
												</select>
											</div>
										</div>
									<?php
									}
									?>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group">
											<label>Tags</label>
											<input type="text" name="tags_input" class="form-control" placeholder="Subject">
										</div>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group">
											<label>Featured Image</label>
											<input type="file" name="feature_image" class="form-control" placeholder="Subject">
										</div>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="btn_bgstyle btn_arrow_style">
											<input type="hidden" name="hdnsbmt" value="1" />
											<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6923398433617120"
                                                 crossorigin="anonymous"></script>
                                            <ins class="adsbygoogle"
                                                 style="display:block; text-align:center;"
                                                 data-ad-layout="in-article"
                                                 data-ad-format="fluid"
                                                 data-ad-client="ca-pub-6923398433617120"
                                                 data-ad-slot="4800625644"></ins>
                                            <script>
                                                 (adsbygoogle = window.adsbygoogle || []).push({});
                                            </script>
											<button class="btn_style" type="submit">Submit <i class="fa fa-arrow-right hvr-forward"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<div class="right_info_sec">
							<ul>
                                <li>
							        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6923398433617120"
                                    crossorigin="anonymous"></script>
                                    <!-- Sidebar Ad -->
                                    <ins class="adsbygoogle"
                                         style="display:block"
                                         data-ad-client="ca-pub-6923398433617120"
                                         data-ad-slot="8945160187"
                                         data-ad-format="auto"
                                         data-full-width-responsive="true"></ins>
                                    <script>
                                         (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
                                </li>
								<li>
									<div class="icon_box">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/donation_icon.png" />
									</div>
									<div class="contnt_box">
										<h4>Donate for Walefare</h4>
										<span>GoogleAlgorithm Team</span>
										
										<div class="paypal_btn">
											<a class="btn_style" href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/img/paypal-img.png" /></a>
										</div>
									</div>
								</li>
								<li>
									<div class="icon_box">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/location_icon.png" />
									</div>
									<div class="contnt_box">
										<h4>Worldwide Offices</h4>
										<span>USA, Canada and Austrailia</span>
									</div>
								</li>
								<li>
									<div class="icon_box">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/smartphone_icon.png" />
									</div>
									<div class="contnt_box">
										<h4>Call now</h4>
										<span><a href="tel:+91-860-2174-086">+91-860-2174-086</a></span>
									</div>
								</li>
								<li>
									<div class="icon_box">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/email_icon.png" />
									</div>
									<div class="contnt_box">
										<h4>Email us</h4>
										<span><a href="mailto:info@googlealgorithm.com">info@googlealgorithm.com</a></span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
<?php get_footer(); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.btn_bgstyle.btn_arrow_style .fa-arrow-right').addClass('fa');
});
</script>