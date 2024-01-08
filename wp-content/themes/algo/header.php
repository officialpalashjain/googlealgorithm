<!doctype html>
<html lang="en">
  <head>
	  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P7R6NLW');</script>
<!-- End Google Tag Manager -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="icon" type="image/png" href="img/fav-icon.png">


    <title><?php echo get_bloginfo('name');?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
	  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7R6NLW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  	<?php
  	$header_logo = get_option("header_logo");
	$logo_alt = get_image_alt_by_url($header_logo);
	$cls = '';
	if(!is_front_page())
	{
		$cls = 'other_page_header';
	}
  	?>
	<header>
		<div class="header_mainsec fixed_sec <?php echo $cls;?>">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="<?php echo site_url();?>">
					<img src="<?php echo $header_logo;?>" alt="PNG Logo of GoogleAlgorithm" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'header_menu',
					'menu_class' => 'navbar-nav',
					'container_class' => 'collapse navbar-collapse',
					'container_id' => 'navbarSupportedContent'
					)
				);
				?>
				
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				
			<div class="social_sec">
					<ul>
					<?php
					$theme_fb_link = get_option("theme_fb_link");
				    $theme_twtr_link = get_option("theme_twtr_link");
				    $theme_ln_link = get_option("theme_ln_link");
				    $theme_insta_link = get_option("theme_insta_link");
				    $theme_ytube_link = get_option("theme_ytube_link");
				    $theme_skype_link = get_option("theme_skype_link");
				    $theme_email_link = get_option("theme_email_link");
					?>
					    
						<li><a href="<?php echo $theme_fb_link; ?>"><i class="fa fa-facebook-f hvr-float"></i></a></li>
						<li><a href="<?php echo $theme_twtr_link; ?>"><i class="fa fa-twitter hvr-float"></i></a></li>
						<li><a href="<?php echo $theme_ln_link; ?>"><i class="fa fa-linkedin-in hvr-float"></i></a></li>
						<li><a href="https://www.instagram.com/google_algorithm/"><i class="fa fa-instagram hvr-float"></i></a></li>
						<li><a href="<?php echo $theme_ytube_link; ?>"><i class="fa fa-youtube hvr-float"></i></a></li>
						<li><a href="<?php echo $theme_skype_link; ?>"><i class="fa fa-skype hvr-float"></i></a></li>
						<li><a href="mailto:<?php echo $theme_email_link; ?>"><i class="fa fa-envelope hvr-float"></i></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>