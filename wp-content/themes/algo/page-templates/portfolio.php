<?php
/**
* Template Name: Portfolio
*
*/
?>
<?php get_header() ?>

<?php
global $post;
$post_id = $post->ID;
?>

<div class="portfolio_page_mainsec">
	<div class="other_page_banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="banner_contnt_sec">
						<h1>Portfolio</h1>
						<div class="breadcrum_mainsec">
							<ul>
								<li><a href="<?php echo site_url(); ?>">Home</a></li>
								<li>Portfolio</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="portfolio_contnt_mainsec">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="onovo-page footer--fixed">
						<div class="wrapper">
							<div id="" class=" page type-page status-publish hentry">
								<div data-elementor-type="wp-page" class="elementor elementor">
									<div class="elementor-widget-container">
										<div class="onovo-portfolio portfolio--side">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
													<!-- Filter projects-->
													<div class="onovo-filter-container">
														<div class="onovo-filter js-onovo-filter">
															<ul>
																<li>
																	<button class="onovo-filter-item item--active" type="button" data-filter="*">
																		<span class="onovo-lnk" data-splitting data-onovo-scroll>All Projects</span>
																	</button>
																</li>
																<?php 
																$terms = get_terms( array(
																	'taxonomy'   => 'portfolio-categories',
																	'hide_empty' => false,
																	'orderby' => 'term_id',
																	'order' => 'ASC',
																));
																if($terms) {
																	foreach ($terms as $k => $v) { ?>
																		<li>
																			<button class="onovo-filter-item" type="button" data-filter=".<?php echo $v->slug; ?>">
																				<span class="onovo-lnk" data-splitting data-onovo-scroll><?php echo $v->name; ?></span>
																			</button>
																		</li>	
																<?php } } ?>			
															</ul>
														</div>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
													<div class="row onovo-portfolio-items">
														<?php 
														if($terms) {
															foreach ($terms as $k => $v) {
																$arr = array(
																	'post_type'	=> 'portfolios',
																	'numberposts'	=> -1,
																	'orderby'          => 'date',
																	'order'            => 'DESC',
																	'tax_query' => array(
																	    array(
																		    'taxonomy' => 'portfolio-categories',
																		    'field' => 'term_id',
																		    'terms' => $v->term_id
																	    )
																	)
																);
																$portfolios = get_posts($arr);
																if($portfolios) {
																	foreach ($portfolios as $k1 => $v1) {
																	$feature_image = wp_get_attachment_url( get_post_thumbnail_id($v1->ID) ); ?>
														?>
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 onovo-portfolio-col <?php echo $v->slug; ?>">
															<div class="onovo-portfolio-item">
																<div class="image" data-onovo-overlay data-onovo-scroll>
																	<a href="<?php echo get_the_permalink($v1->ID); ?>" class="onovo-hover-3">
																		<noscript>
																			<img decoding="async" src="<?php echo $feature_image; ?>" alt="Museums Art Concept" />
																		</noscript>
																		<img class="lazyload" decoding="async" src='<?php echo $feature_image; ?>' data-src="<?php echo $feature_image; ?>" alt="<?php echo $v1->post_title; ?>" />
																	</a>
																</div>
																<div class="desc">
																	<h5 class="title">
																		<a class="onovo-lnk" href="<?php echo get_the_permalink($v1->ID); ?>">
																			<span data-splitting data-onovo-scroll><?php echo $v1->post_title; ?></span>
																		</a>
																	</h5>
																	<div class="text">
																		<div data-splitting data-onovo-scroll>
																			<span><?php echo $v->name; ?> <em>,</em>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<?php } } } } ?>
													</div>
													<div class="onovo-loadmore btn_bgstyle">
														<a class="onovo-btn onovo-hover-btn btn_style" href="#">
															<i class="arrow">
																<span></span>
															</i>
															<span>Load More</span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>

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