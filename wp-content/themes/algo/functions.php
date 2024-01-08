<?php
// echo __DIR__ . '../../../../wp-load.php';
// die;
// session_start();

include_once('includes/theme-options.php');

add_theme_support( 'post-thumbnails' );

add_action('admin_enqueue_scripts', 'theme_backend_scripts_styles');
function theme_backend_scripts_styles()
{
  wp_enqueue_style('thickbox');
  // wp_enqueue_style('admin-styles-css', get_stylesheet_directory_uri().'/css/admin-style.css');

  wp_enqueue_script('jquery');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_script('admin-scripts', get_stylesheet_directory_uri().'/js/admin-scripts.js');
}

add_action('wp_enqueue_scripts', 'theme_frontend_scripts_styles');
function theme_frontend_scripts_styles()
{
  wp_enqueue_style('bootstrap-min-css', get_stylesheet_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style('css-styles-css', get_stylesheet_directory_uri().'/css/style.css');
  wp_enqueue_style('css-hover-css', get_stylesheet_directory_uri().'/css/hover.css');
  wp_enqueue_style('css-aos-css', get_stylesheet_directory_uri().'/css/aos.css');
  wp_enqueue_style('css-slick-css', get_stylesheet_directory_uri().'/css/slick.css');
  wp_enqueue_style('css-slick-theme-css', get_stylesheet_directory_uri().'/css/slick-theme.css');
  wp_enqueue_style('fontawesome5-min-css', get_stylesheet_directory_uri().'/css/fontawesome5.min.css');
  wp_enqueue_style('css-fancybox.min-css', get_stylesheet_directory_uri().'/css/fancybox.min.css');
  
  wp_enqueue_style('theme-style', get_stylesheet_directory_uri().'/style.css'); 
      
      
  // wp_enqueue_script('slim-min-js', 'https://code.jquery.com/jquery-3.1.1.slim.min.js' ,'','',true);
  wp_enqueue_script('jquery-min-js', 'https://code.jquery.com/jquery-3.1.1.min.js' ,'','',true);
  wp_enqueue_script('popper-min-js', get_stylesheet_directory_uri().'/js/popper.min.js' ,'','',true);
  wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri().'/js/bootstrap.min.js' ,'','',true);
  wp_enqueue_script('aos-js', get_stylesheet_directory_uri().'/js/aos.js' ,'','',true);
  wp_enqueue_script('fontawesome5-min-js', get_stylesheet_directory_uri().'/js/fontawesome5.min.js' ,'','',true);
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri().'/js/slick.min.js' ,'','',true);
  wp_enqueue_script('custum-js', get_stylesheet_directory_uri().'/js/custum.js' ,'','',true);
  wp_enqueue_script('fancybox-min-js', get_stylesheet_directory_uri().'/js/fancybox.min.js' ,'','',true);
  wp_enqueue_script('lazysizes-min-js', get_stylesheet_directory_uri().'/js/lazysizes.min.js' ,'','',true);
  wp_enqueue_script('portfolio-min-js', get_stylesheet_directory_uri().'/js/portfolio.js' ,'','',true);
}





add_action( 'after_setup_theme', 'when_theme_isset' );
function when_theme_isset() {
  register_nav_menu( 'header_menu', __( 'Header Menu', 'algo' ) );
  register_nav_menu( 'footer_menu', __( 'Footer Menu', 'algo' ) );
}


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}

add_filter( 'the_content', 'wpse_wpautop_nobr' );
add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );

add_filter('use_block_editor_for_post', '__return_false');




function get_image_alt_by_url( $image_url ) {
    global $wpdb;

    if( empty( $image_url ) ) {
        return false;
    }
    $query_arr  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", strtolower( $image_url ) ) );
    if(empty($query_arr))
    {
      $image_url = str_replace("https", "http", $image_url);
      $query_arr  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", strtolower( $image_url ) ) );
    }

    // print_r($query_arr);
    $image_id   = ( ! empty( $query_arr ) ) ? $query_arr[0] : 0;

    return get_post_meta( $image_id, '_wp_attachment_image_alt', true );
}


// get data from custom field suite
function get_custom_field_data($key, $id)
{
  return CFS()->get( $key, $id ); 
}
// get data from custom field suite


remove_filter('the_content', 'wpautop');

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


function custom_excerpt($content)
{
  $text = strip_shortcodes( $content );
  $text = apply_filters( 'the_content', $text );
  $text = str_replace(']]>', ']]&gt;', $text);
  $excerpt_length = apply_filters( 'excerpt_length', 24 );
  // $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
  $excerpt_more = '';
  $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  return $text;
}

// increasing post count
function update_custom_post_view($post_id)
{
  $post_view = get_custom_post_view($post_id);
  $post_view++;
  update_post_meta($post_id, 'custom_post_view', $post_view);
}
// increasing post count

// getting post count
function get_custom_post_view($post_id)
{
  $post_view = get_post_meta($post_id, 'custom_post_view', true);
  if(empty($post_view))
  {
    $post_view = 0;
  }
  return $post_view;
}
// getting post count


// creating portfolio post type
add_action( 'init' , 'custompostypescb' );
function custompostypescb(){
  $labels = array(
        'name'               => _x( 'Portfolio', 'post type general name' ),
        'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
        'add_new'            => _x( 'Add Portfolio', 'portfolios' ),
        'add_new_item'       => __( 'Add Portfolio' ),
        'edit_item'          => __( 'Edit Portfolio' ),
        'new_item'           => __( 'New Portfolio' ),
        'all_items'          => __( 'All Portfolios' ),
        'view_item'          => __( 'View Portfolio' ),
        'search_items'       => __( 'Search' ),
        'menu_name'          => 'Portfolios'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Let\'s Create Portfolio post',
        'public'        => true,
        'menu_position' => '',
        'supports'      => array( 'title', 'thumbnail', 'editor'),
        'has_archive'   => true,
    // 'register_meta_box_cb' => 'bdscpartnershops_metaboxes',
        // 'exclude_from_search'   => true,
        // 'publicly_queryable'   => false,
    );
  register_post_type( 'portfolios', $args);
}
// creating portfolio post type


function add_custom_taxonomies() {
  // Add new "Categories" taxonomy to Posts
  register_taxonomy('portfolio-categories', 'portfolios', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Categories', 'taxonomy general name' ),
      'singular_name' => _x( 'Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Categories' ),
      'all_items' => __( 'All Categories' ),
      // 'parent_item' => __( 'Parent Category' ),
      // 'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item' => __( 'Edit Category' ),
      'update_item' => __( 'Update Category' ),
      'add_new_item' => __( 'Add New Category' ),
      'new_item_name' => __( 'New Category Name' ),
      'menu_name' => __( 'Categories' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'portfolio-categories', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/Categories/"
      'hierarchical' => true // This will allow URL's like "/Categories/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );


add_action('wp_ajax_load_blog_ajax', 'load_blog_ajax');
add_action('wp_ajax_nopriv_load_blog_ajax', 'load_blog_ajax');
function load_blog_ajax() {

  $paged = $_POST['page'];
  $number_of_posts_per_page = 6;
  $initial_offset = 6;
  $number_of_posts_past = $number_of_posts_per_page * ($paged - 1);
  $offset = $initial_offset + (($paged > 1) ? $number_of_posts_past : 0);

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $number_of_posts_per_page,
    'paged' => $paged,
    'offset' => $offset,
    'orderby'          => 'date',
    'order'            => 'DESC'
  );
  if(!empty($_POST['ID'])) {
    $args['author'] = $_POST['ID'];
  }

  $blogs = get_posts( $args );
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
      // $excerpt  = custom_excerpt($sngl->post_content);
      $excerpt = wp_trim_words( $sngl->post_content, 24, '...' );
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
            <h5><a href="<?php echo $permalink;?>"><?php echo $blog_id.' '.$blog_title.' '.$paged;?></a></h5>
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
    <?php
  }
   else {
    echo 'no_post';
  }
  wp_die();
}

add_action('wp_ajax_load_blog_bycat', 'load_blog_bycat');
add_action('wp_ajax_nopriv_load_blog_bycat', 'load_blog_bycat');
function load_blog_bycat() {
  $cat_slug = $_POST['cat_slug'];
  $paged = $_POST['page'];
  $number_of_posts_per_page = 9;
  $initial_offset = 9;
  $number_of_posts_past = $number_of_posts_per_page * ($paged - 1);
  $offset = $initial_offset + (($paged > 1) ? $number_of_posts_past : 0);

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $number_of_posts_per_page,
    'paged' => $paged,
    'offset' => $offset,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'category_name' => $cat_slug
  );
  if(!empty($_POST['ID'])) {
    $args['author'] = $_POST['ID'];
  }

  $blogs = get_posts( $args );
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
      // $excerpt  = custom_excerpt($sngl->post_content);
      $excerpt = wp_trim_words( $sngl->post_content, 24, '...' );
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
            <h5><a href="<?php echo $permalink;?>"><?php echo $blog_id.' '.$blog_title.' '.$paged;?></a></h5>
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
    <?php
  }
   else {
    echo 'no_post';
  }
  wp_die();
}