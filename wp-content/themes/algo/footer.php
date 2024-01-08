<?php
$header_logo = get_option("header_logo");
$logo_alt = get_image_alt_by_url($header_logo);
$footer_email = get_option("footer_email");

$theme_fb_link = get_option("theme_fb_link");
$theme_twtr_link = get_option("theme_twtr_link");
$theme_ln_link = get_option("theme_ln_link");
$theme_insta_link = get_option("theme_insta_link");
$theme_ytube_link = get_option("theme_ytube_link");
$theme_skype_link = get_option("theme_skype_link");
$theme_email_link = get_option("theme_email_link");


$arr = array(
	'post_type'	=> 'post',
	'numberposts'	=> 3,
	'category'		=> 4,
	'orderby'          => 'date',
    'order'            => 'DESC'
);
$fblogs = get_posts($arr);

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty'	=> true,
    'number'	=> 4
) );

$footer_copyright = get_option("footer_copyright");
?>
	<footer>
		<div class="footer_mainsec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
						<div class="logo_sec">
							<img src="<?php echo $header_logo; ?>" alt="PNG Image Logo of GoogleAlgorithm" />
						</div>
						<div class="contact_sec">
							<p>GoogleAlgorithm</p>
							<div class="contact_txt">
								<span>Contact us: </span><a href="mailto:<?php echo $footer_email; ?>"><?php echo $footer_email; ?></a>
							</div>
						</div>
						<div class="social_sec">
							<ul>
							    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
								<li><a href="<?php echo $theme_fb_link; ?>"><i class="fa fa-facebook hvr-float"></i></a></li>
								<li><a href="<?php echo $theme_twtr_link;?>"><i class="fa fa-twitter hvr-float"></i></a></li>
								<li><a href="<?php echo $theme_ln_link;?>"><i class="fa fa-linkedin-in hvr-float"></i></a></li>
								<li><a href="<?php echo $theme_insta_link;?>"><i class="fa fa-instagram hvr-float"></i></a></li>
								<li><a href="<?php echo $theme_ytube_link;?>"><i class="fa fa-youtube hvr-float"></i></a></li>
								<li><a href="<?php echo $theme_skype_link;?>"><i class="fa fa-skype hvr-float"></i></a></li>
								<li><a href="mailto:<?php echo $theme_email_link;?>"><i class="fa fa-envelope hvr-float"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
						<?php
						if(!empty($fblogs))
						{
							$html = '';
							$html .= '<div class="popular_post_sec">';
								$html .= '<div class="footer_box_title">';
									$html .= '<h4>Popular Posts</h4>';
								$html .= '</div>';
								$html .= '<div class="posts_sec">';
									$html .= '<ul>';
										foreach($fblogs as $sngl)
										{
											$blog_id = $sngl->ID;
											$permalink = get_permalink($blog_id);
											$blog_title = $sngl->post_title;
											$feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
											$post_date = $sngl->post_date;
											$post_date = date('F j, Y', strtotime($post_date));
											
											$html .= '<li>';
												$html .= '<a href="'.$permalink.'">';
													$html .= '<div class="posts_boxsec">';
														$html .= '<div class="img_sec">';
															$html .= '<img src="'.$feature_image.'">';
														$html .= '</div>';
														$html .= '<div class="contnt_sec">';
															$html .= '<h6>'.$blog_title.'</h6>';
															$html .= '<p>'.$post_date.'</p>';
														$html .= '</div>';
													$html .= '</div>';
												$html .= '</a>';
											$html .= '</li>';
										}
									$html .= '</ul>';
								$html .= '</div>';
							$html .= '</div>';
						echo $html;
						}
						?>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
						<?php
						if(!empty($categories))
						{
							$html = '';
							$html .= '<div class="category_sec">';
								$html .= '<div class="footer_box_title">';
									$html .= '<h4>Popular Category</h4>';
								$html .= '</div>';
								$html .= '<div class="category_inner_sec">';
									$html .= '<ul>';
										foreach($categories as $cat)
										{
											$cat_id = $cat->term_id;
											$name = $cat->name;
											$count  = $cat->count;
											$category_link = get_category_link( $cat_id );
											$html .= '<li>';
												$html .= '<a href="'.$category_link.'">';
													$html .= '<div class="category_boxsec">';
														$html .= '<span>'.$name.'</span>';
														$html .= '<span>'.$count.'</span>';
													$html .= '</div>';
												$html .= '</a>';
											$html .= '</li>';	
										}
									$html .= '</ul>';
								$html .= '</div>';
							$html .= '</div>';
							echo $html;
						}
						?>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
						<div class="footer_menu">
							<div class="footer_box_title">
								<h4>Quick Links</h4>
							</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer_menu',
								'menu_class' => '',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6923398433617120"
     crossorigin="anonymous"></script>
<!-- Footer Ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6923398433617120"
     data-ad-slot="5458353071"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</div>
		<div class="copyright_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="contnt_txt text-center">
							<p><?php echo $footer_copyright;?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	
  </body>
</html>