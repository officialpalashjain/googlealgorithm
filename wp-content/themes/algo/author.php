<?php

?>

<?php get_header(); ?>

	<?php
	$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
	
	$authot_id = $author->ID;
	$author_display_name = $author->display_name;
	$authorimage = get_avatar($authot_id, 'full');
	$userdata = get_user_meta( $authot_id );
	$customlink1 = get_user_meta($authot_id, 'customlink1' ,true);
	$customlink2 = get_user_meta($authot_id, 'customlink2' ,true);
	$customlink3 = get_user_meta($authot_id, 'customlink3' ,true);
	$customlink4 = get_user_meta($authot_id, 'customlink4' ,true);
  $customlinkn1 = get_user_meta($authot_id, 'customlinkn1' ,true);
  $customlinkn2 = get_user_meta($authot_id, 'customlinkn2' ,true);
  $customlinkn3 = get_user_meta($authot_id, 'customlinkn3' ,true);
  $customlinkn4 = get_user_meta($authot_id, 'customlinkn4' ,true);
	$initialNumberPosts = 6;
	if (isset($_GET['num_posts'])) {
		$numberPosts = intval($_GET['num_posts']);
	} else {
		$numberPosts = $initialNumberPosts;
	}
	$arr = array(
		'post_type'	=> 'post',
		'numberposts'	=> $numberPosts,
		'orderby'          => 'date',
    'order'            => 'DESC',
    'author' => $authot_id
	);
	$blogs = get_posts($arr);
	?>
	
	<div class="blog_page_mainsec">
		<div class="other_page_banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="banner_contnt_sec">
							<h1><?php echo $author_display_name; ?></h1>
							<div class="breadcrum_mainsec">
								<ul>
									<li><a href="<?php echo site_url();?>">Home</a></li>
									<li><?php echo $author_display_name; ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="author_main_sec">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
						<div class="authorimage">
							<?php echo $authorimage; ?>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
						<div class="author_display_name" style="color:#000;">
							<h2><?php echo $author_display_name; ?></h2>
						</div>
						<div class="userdata_des" style="color:red;">
							<p><?php echo $userdata['description'][0]; ?></p>
							<ul>	    
								<?php if(!empty($userdata['facebook'][0])) { ?>
									<li><a href="<?php echo $userdata['facebook'][0]; ?>"><i class="fa fa-facebook-f hvr-float"></i></a></li>
								<?php } ?>
								<?php if(!empty($userdata['twitter'][0])) { ?>
									<li><a href="<?php echo $userdata['twitter'][0]; ?>"><i class="fa fa-twitter hvr-float"></i></a></li>
								<?php } ?>
								<?php if(!empty($userdata['linkedin'][0])) { ?>
									<li><a href="<?php echo $userdata['linkedin'][0]; ?>"><i class="fa fa-linkedin-in hvr-float"></i></a></li>
								<?php } ?>
								<?php if(!empty($userdata['instagram'][0])) { ?>
									<li><a href="<?php echo $userdata['instagram'][0]; ?>"><i class="fa fa-instagram hvr-float"></i></a></li>
								<?php } ?>
								<?php if(!empty($userdata['youtube'][0])) { ?>
									<li><a href="<?php echo $userdata['youtube'][0]; ?>"><i class="fa fa-youtube hvr-float"></i></a></li>
								<?php } ?>
								<?php   if($customlink1) { ?>
                    <li><a href="<?php echo $customlink1; ?>"><?php echo $customlinkn1; ?></a></li>
                <?php } ?>
                <?php   if($customlink2) { ?>
                    <li><a href="<?php echo $customlink2; ?>"><?php echo $customlinkn2; ?></a></li>
                <?php } ?>
                <?php   if($customlink3) { ?>
                    <li><a href="<?php echo $customlink3; ?>"><?php echo $customlinkn3; ?></a></li>
                <?php } ?>
                <?php   if($customlink4) { ?>
                    <li><a href="<?php echo $customlink4; ?>"><?php echo $customlinkn4; ?></a></li>
                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="blog_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="left_info_sec">
							<div class="title_mainsec">
								<h2>Blog</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					if(!empty($blogs))
					{
						foreach($blogs as $sngl)
						{
							$blog_id = $sngl->ID;
							$permalink = get_permalink($blog_id);
							$blog_title = $sngl->post_title;
							$feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
							$author_name = get_the_author_meta( 'display_name', $sngl->post_author );
							$post_date = $sngl->post_date;
							$post_date = date('F j, Y', strtotime($post_date));
							$author_image = get_avatar($sngl->post_author, 30);
							$excerpt  = custom_excerpt($sngl->post_content);
							$author_link = get_author_posts_url($sngl->post_author);
						?>
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<div class="blog_boxsec">
									<div class="img_sec">
										<img src="<?php echo $feature_image; ?>" />
									</div>
									<div class="name_date_sec">
										<span class="name_sec"><span class="admin_icon"><?php echo $author_image;?></span> <a href="<?php echo $author_link; ?>"><?php echo $author_name;?></a></span>
										<span class="date_sec"><span class="calendar_icon"><img src="<?php echo get_stylesheet_directory_uri();?>/img/calendar_icon.png" /></span> <?php echo $post_date;?></span>
									</div>
									<div class="contnt_sec">
										<h5><a href="<?php echo $permalink;?>"><?php echo $blog_title;?></a></h5>
										<p><?php echo $excerpt; ?></p>
										<div class="txt_btn">
											<a class="btn_style" href="<?php echo $permalink;?>">Read More <i class="fa fa-arrow-right hvr-forward"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						
						?>
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 blog_append">
							<div class="btn_mainsec btn_bgstyle">
								<a class="btn_style loadmore_blog" href="javascript:void(0)">Load More</a>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				
			</div>
		</div>
	</div>

<?php get_footer(); ?>
<script type="text/javascript">
var page = 2;
jQuery(document).on('click' , '.loadmore_blog' , function(){
	console.log('ok');
	alert('ok');
  jQuery('.ajax-loder').show();
  jQuery.ajax({
    type:'POST',
    url: '<?php echo admin_url('admin-ajax.php'); ?>',
    data: {
      action: 'load_blog_ajax',
      'page' : page,
      'ID' : '<?php echo $author_id; ?>'
      
    },
    success: function(results){
      if(results.trim() == 'no_post'){
        jQuery('.blog_append').before('<h2 class="sorry_message">Sorry blog not found.</h2>'); 
        jQuery('.loadmore_blog').hide();
        jQuery('.ajax-loder').hide();
      }else{
        jQuery('.ajax-loder').hide();
        jQuery('.blog_append').before(results);
        page++;
      }

    },
    error: function(results) {
      alert('error');
    }
  });
});
</script>