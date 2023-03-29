<?php
/**
 * AssetWise functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AssetWise
 */

if ( ! function_exists( 'assetwise_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function assetwise_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on AssetWise, use a find and replace
     * to change 'assetwise' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'assetwise', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'menu-1' => esc_html__( 'Primary', 'assetwise' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'assetwise_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'assetwise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function assetwise_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'assetwise_content_width', 640 );
}
add_action( 'after_setup_theme', 'assetwise_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */

function assetwise_scripts() {

  //Define Assets Function
  //$assetsDate = getdate();

  wp_enqueue_style('assetwise-style', get_stylesheet_uri());
  wp_enqueue_style('font-db-heaven-style', get_template_directory_uri() . '/fonts/stylesheet.css');
  wp_enqueue_style('bs-style', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css');
  wp_enqueue_style('slick', get_template_directory_uri() . '/styles/slick/slick.css');
  wp_enqueue_style('slick-theme', get_template_directory_uri() . '/styles/slick/slick-theme.css');
  wp_enqueue_style('Flexbox Style', get_template_directory_uri() . '/plugins/flexslider/flexslider.css');
  wp_enqueue_style('custom-style', get_template_directory_uri() . '/styles/style.css');

  wp_enqueue_style('shortcode-styles', get_template_directory_uri() . '/styles/shortcode.css');

  //$tpl_slug = get_page_template_slug(get_the_ID());
  wp_enqueue_style('new-condominium-styles', get_stylesheet_directory_uri() . '/styles/new-condominium/style.css');

  if (is_front_page()) {
    wp_enqueue_style('Main Page Styles', get_template_directory_uri() . '/styles/page-main-project.css', '', '1.0.0');
  }

//  // Load CSS Base on Page ID
//  if (in_array(get_the_ID(), array(27,7466,7251))) {
//    wp_enqueue_style('about-page-style', get_template_directory_uri().'/styles/pages/about.css');
//  }
//  if (in_array(get_the_ID(), array(29,7515,7301))) {
//    wp_enqueue_style('contact-page-style', get_template_directory_uri().'/styles/pages/contact.css');
//  }
//  if (get_the_ID() === 31) {
//    wp_enqueue_style('club-page-style', get_template_directory_uri().'/styles/pages/club.css');
//  }

  if (get_the_ID() === 39575 || get_the_ID() === 39992 || get_the_ID() === 19279 || get_the_ID() === 42472 || get_the_ID() === 42114 || get_the_ID() === 42613) {
    wp_enqueue_style('Modiz 50 Style', get_template_directory_uri() . '/styles/modiz50.css');
  }
  if (get_the_ID() === 39992 || get_the_ID() === 19279 || get_the_ID() === 42472 || get_the_ID() === 42114) {
    wp_enqueue_style('Modiz Bangpho Custom Style', get_template_directory_uri() . '/styles/modiz-bangpho.css');
  }

  if (is_page_template('views/modiz50-thankyou.php')) {
    wp_enqueue_style('DB Gill Siam Font', get_template_directory_uri() . '/fonts/db_gill-siam-x/stylesheet.css');
    wp_enqueue_style('Modiz 50 Thankyou page Style', get_template_directory_uri() . '/styles/modiz50-thankyou.css');
  }

  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', '', '3.5.1');
  wp_enqueue_script('jquery');
  wp_enqueue_script('Match Height', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array(), '0.7.2', true);
  wp_enqueue_script('assetwise-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
  wp_enqueue_script('assetwise-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
  wp_enqueue_script('Popper', get_template_directory_uri() . '/js/popper/popper.min.js', array(), '1.12.5', true);
  wp_enqueue_script('PopperUtil', get_template_directory_uri() . '/js/popper/popper-utils.min.js', array(), '1.12.5', true);
  wp_enqueue_script('Bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
  wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), '1.8.2', true);
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/script.min.js', array(), '1.2', true);

//  wp_localize_script('custom-js', 'newProjectsLoadmore', array('ajax_url' => admin_url('admin-ajax.php')));
//  wp_localize_script('custom-js', 'activityLoadMore', array('ajax_url' => admin_url('admin-ajax.php')));
//  wp_localize_script('custom-js', 'loadMore', array('ajax_url' => admin_url('admin-ajax.php')));
//  // Init ajax url (you can copy this function and change name of url in 'callajax' to other)
//  wp_localize_script('custom-js', 'callajax', array('ajax_url' => admin_url('admin-ajax.php')));
//
//  if (get_page_template_slug(get_the_ID()) === 'pages/page-blog.php') {
//    wp_enqueue_script('Blog Scripts', get_template_directory_uri().'/js/blogs.js', '', '', true);
//  }
//  if ( is_archive() ) {
//    wp_enqueue_style('archive_style', get_template_directory_uri().'/styles/archive.css', '', '', '');
//  }
//  if (is_page_template('pages/page-loan-calculator.php')) {
//    wp_enqueue_style('Loan Calculate Page Styles', get_template_directory_uri() . '/styles/loan-calculate.css');
//  }
}

function remove_frontend_junk() {
  wp_dequeue_script('wpcf7cf-scripts');
}

add_action('wp_enqueue_scripts', 'remove_frontend_junk', 300);

function project_Assets() {
  //Get Style for each project page
  if(is_singular('condominium')) {
    wp_enqueue_style('Progress Circle Style', get_template_directory_uri() . '/styles/plugins/bar.css');
    wp_enqueue_style('Lity Style', get_template_directory_uri() . '/styles/plugins/lity.min.css');
    wp_enqueue_script('jQuery Validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.17.0', true);
    wp_enqueue_script('Flex Slider', get_template_directory_uri() . '/plugins/flexslider/jquery.flexslider.js', array(), '2.6.2', true);
    wp_enqueue_script('Lity Script', get_template_directory_uri() . '/js/lity.min.js', array(), '3.0.0', true);
  }
  if (is_singular('condominium')) {
    if (get_the_ID() === 28131 || get_the_ID() === 30359 || get_page_template_slug() === 'single-condominium-new.php') {
      wp_enqueue_style('swiper-style', get_template_directory_uri() . '/plugins/swiperjs/swiper-bundle.min.css');
      wp_enqueue_script('swiper-scritp', get_template_directory_uri() . '/plugins/swiperjs/swiper-bundle.min.js','','',true);
    }
    if (get_the_ID() === 31520) {
      wp_enqueue_script( 'kave salaya scripts', get_template_directory_uri() . '/js/condominium/kave-salaya.js', '', '', true);
    }
    $to_thank_url = array_filter(explode("/", get_permalink()));
    if(get_post_type() == "condominium" && end($to_thank_url) !== "thank-you") {
      wp_enqueue_style('New Condominium Core Styles', get_template_directory_uri().'/styles/condominium/condominium.css', '');
      wp_enqueue_script('New Condominium Core Scripts', get_template_directory_uri() . '/js/condominium/condominium.js', array(), '', true);
    }
  }
//  if (is_singular('house')) {
//    if (end($to_thank_url) !== "thank-you") {
//      wp_enqueue_style('House Project styles', get_template_directory_uri().'/styles/house/house.css', '');
//      wp_enqueue_script('House Project Scripts', get_template_directory_uri() . '/js/house/house.js', array(), '', true);
//    }
//  }
  //wp_enqueue_script('Modernize', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', array(), '2.8.3', true);
  //wp_enqueue_script('Modernize Custom', get_template_directory_uri() . '/js/modernizr-custom.min.js', array(), '3.3.1', true);
  //wp_enqueue_script('Lightbox', get_template_directory_uri() . '/plugins/lightbox/js/lightbox.min.js', array(), '2.9.0', true);
  //wp_enqueue_script('Sweet Alert', 'https://cdn.jsdelivr.net/npm/sweetalert2@8', array(), '8', true);
}

add_action('wp_enqueue_scripts', 'assetwise_scripts');
add_action('wp_enqueue_scripts', 'project_Assets');

function admin_custom_styles() {
  wp_enqueue_style('Custom Admin Style', get_template_directory_uri() . '/styles/custom-admin.css', '', '1.0.1');
}

add_action('admin_head', 'admin_custom_styles');

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function text_widgets_title( array $params) {
  $widget =& $params[0];
  $widget['before_title'] = '<h4 class="title"><span class="sidebar-title">';
  $widget['after_title'] = '</span></h4>';
  return $params;
}

add_filter('dynamic_sidebar_params', 'text_widgets_title', 20);

function pagecat_settings() {
  // Add tag metabox to page
  register_taxonomy_for_object_type('post_tag', 'page');
  // Add category metabox to page
  register_taxonomy_for_object_type('category', 'page');
}
// Add to the admin_init hook of your theme functions.php file
add_action( 'init', 'pagecat_settings' );

function get_gallery_images($gallery_name, $p_id){
  $images = acf_photo_gallery($gallery_name, $p_id);
  //Check if return array has anything in it
  if( count($images) ) {
    foreach($images as $image){
      $id = $image['id'];
      $full_image_url= $image['full_image_url'];
      $url= $image['url'];
      return "<img src='" . $full_image_url ."' alt=''>";
    }
  }
}

//Dashboard Custom
// ============================================================

/*Remove WordPress menu from admin bar*/
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}

//Get tags
function post_type_tags( $post_type = '' ) {
    global $wpdb;

    if ( empty( $post_type ) ) {
        $post_type = get_post_type();
    }

    return $wpdb->get_results( $wpdb->prepare( "
            SELECT COUNT( DISTINCT tr.object_id )
                AS count, tt.taxonomy, tt.description, tt.term_taxonomy_id, t.name, t.slug, t.term_id
            FROM {$wpdb->posts} p
            INNER JOIN {$wpdb->term_relationships} tr
                ON p.ID=tr.object_id
            INNER JOIN {$wpdb->term_taxonomy} tt
                ON tt.term_taxonomy_id=tr.term_taxonomy_id
            INNER JOIN {$wpdb->terms} t
                ON t.term_id=tt.term_taxonomy_id
            WHERE p.post_type=%s
                AND tt.taxonomy='post_tag'
            GROUP BY tt.term_taxonomy_id
            ORDER BY count DESC
        ", $post_type ) );
}

function show_project_checkbox($loc) {
	return "<div class='col-sm-4'><label class='checkbox'><input type='checkbox' value='" . $loc->slug . "'>" . $loc->name . "<span class='checkmark'></span></label></div>";
}

function page_id( $id = '' ) {
    global $post;
    $id = $post->post_name;
    echo "id='" . $id . "'";
}

function wp_custom_meta_description() {
    // Nothing to do
//    if ( ! is_single() )
//        return;
//
//    // Fetch our custom field value
//    $title = get_field('share_title');
//    $desc = get_field('share_title');
//    $image = get_field('share_image');
//
//    // OG Title
//    if( ! empty( $title ) ) {
//        printf('<meta name="og:title" content="%s" />', $title);
//    } else {
//        printf('<meta name="og:title" content="%s" />', get_the_title());
//    }
//
//    // OG Description
//    if( ! empty( $title ) ) {
//        printf('<meta name="og:description" content="%s" />', $desc);
//    } else {
//        printf('<meta name="og:description" content="%s" />', substr(get_the_content(), 0, 300));
//    }
//
//    // OG Description
//    if( ! empty( $title ) ) {
//        printf('<meta name="og:image" content="%s" />', $image);
//    } else {
//        printf('<meta name="og:image" content="%s" />', get_the_post_thumbnail_url('full'));
//    }
}

function fadeColor($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
		return $default;

	//Sanitize $color if "#" is provided
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	$rgb =  array_map('hexdec', $hex);

	//Check if opacity is set(rgba or rgb)
	if($opacity){
	if(abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
  } else {
	$output = 'rgb('.implode(",",$rgb).')';
	}

	//Return rgb(a) color string
	return $output;
}

function inverseHex( $color ) {
//	$color       = TRIM($color);
//	$prependHash = FALSE;
//
//	IF(STRPOS($color,'#')!==FALSE) {
//		$prependHash = TRUE;
//		$color       = STR_REPLACE('#',NULL,$color);
//	}
//
//	SWITCH($len=STRLEN($color)) {
//		CASE 3:
//			$color=PREG_REPLACE("/(.)(.)(.)/","\\1\\1\\2\\2\\3\\3",$color);
//			break;
//		CASE 6:
//			BREAK;
//		DEFAULT:
//			TRIGGER_ERROR("Invalid hex length ($len). Must be (3) or (6)", E_USER_ERROR);
//	}
//
//	IF(!PREG_MATCH('/[a-f0-9]{6}/i',$color)) {
//		$color = HTMLENTITIES($color);
//		TRIGGER_ERROR( "Invalid hex string #$color", E_USER_ERROR );
//	}
//
//	$r = DECHEX(255-HEXDEC(SUBSTR($color,0,2)));
//	$r = (STRLEN($r)>1)?$r:'0'.$r;
//	$g = DECHEX(255-HEXDEC(SUBSTR($color,2,2)));
//	$g = (STRLEN($g)>1)?$g:'0'.$g;
//	$b = DECHEX(255-HEXDEC(SUBSTR($color,4,2)));
//	$b = (STRLEN($b)>1)?$b:'0'.$b;
//
//	RETURN ($prependHash?'#':NULL).$r.$g.$b;
}

add_action('admin_head', 'disable_acf_gallery_backdrop');

function disable_acf_gallery_backdrop() {
  echo '<style>
    .acf-gallery-backdrop {
      display: none;
    }
    #acf-photo-gallery-metabox-edit .acf-edit-photo-gallery {
      top: 20%;
    }
  </style>';
}

// define the wp_mail_failed callback
function action_wp_mail_failed($wp_error) {
  //return error_log(print_r($wp_error, true));
}

// add the action
//add_action('wp_mail_failed', 'action_wp_mail_failed', 10, 1);

function create_tab_key($name) {
  $name = str_replace(' ', '-', $name); // Replaces all spaces with hyphens.
  return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($name)); // Removes special chars.
  //return $tab_key = preg_replace('/\s+/', '-', strtolower($name));
}

function custom_filter_wpcf7_is_tel( $result, $tel ) {
  $result = preg_match( '/^0[0-9]{8,9}$/', $tel );
  return $result;
}
add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );

/**
 * Global functions
 */
function include_with_variables($filePath, $variables = array(), $print = true) {
  $output = NULL;
  if(file_exists($filePath)){
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    // Include the template file
    include $filePath;

    // End buffering and return its contents
    $output = ob_get_clean();
  }
  if ($print) {
    print $output;
  }
  return $output;

}

function floor_plans () {
  ob_start();
  include_with_variables(get_stylesheet_directory().'/template-parts/new-condominium/partials/_floor-plan.php');
  return ob_get_clean();
}

function galleries () {
  ob_start();
  include_with_variables(get_stylesheet_directory().'/template-parts/new-condominium/partials/_gallery.php');
  return ob_get_clean();
}

function progress () {
  ob_start();
  include_with_variables(get_stylesheet_directory().'/template-parts/shortcode/project-progress.php');
  return ob_get_clean();
}

function top_menu () {
  include_with_variables(get_stylesheet_directory().'/template-parts/new-condominium/partials/_top-menu.php');
}

function top_menu_2 () {
  //ob_start();
  if (get_field('top_menu', get_the_ID())) {
    $top_menu = get_field('top_menu', get_the_ID());
    $html = '<section id="top_menu" class="menu_flex">';
    $html .= '<nav id="top_bar" class="navbar" role="navigation">';
    $html .= '<ul class="nav navbar-nav">';
    foreach ($top_menu as $item) {
      $hash = $item['link_to_section'];
      if (strpos($hash, '#') === false) {
        $hash = '#'.$hash;
      }
      $html .= '<li><a href="' . $hash . '" title="' . $item['label'] . '">' . $item['label'] . '</a></li>';
    }
    $html .= '</ul></nav></section>';
    echo $html;
    //$html = ob_get_clean();
  }
}

function concept_shortcode() {
  ob_start();
  include_with_variables(get_stylesheet_directory().'/shortcode/concept.php');
  return ob_get_clean();
}

function facility_module_call () {
  ob_start();
  include_with_variables(get_stylesheet_directory().'/shortcode/modules/facility.php');
  return ob_get_clean();
}

function get_content_excerpt() {
  ob_start();
  $content = get_the_content();
  echo mb_substr(strip_tags($content), 0, 150, 'UTF-8');
  return ob_get_clean();
}

function get_content_category() {
  ob_start();
  $terms = get_the_category(get_the_ID());
  echo '<span class="blog-cat">' . ($terms[0]->name) . '</span>';
  return ob_get_clean();
}

add_shortcode('floor-plan', 'floor_plans');
add_shortcode('galleries', 'galleries');
add_shortcode('progress', 'progress');
add_shortcode('top-menu', 'top_menu');
add_shortcode('top-menu-2', 'top_menu_2');
add_shortcode('concept_shortcode', 'concept_shortcode');
add_shortcode( 'facility_mod', 'facility_module_call' );
add_shortcode('get_content_as_excerpt', 'get_content_excerpt');
add_shortcode('get_content_terms', 'get_content_category');
add_action('wp_print_scripts', function () {
  if (get_field('header_code', get_the_ID()))
    echo get_field('header_code', get_the_ID());
});
add_action('wp_body_open', function () {
  if (get_field('body_code', get_the_ID()))
    echo get_field('body_code', get_the_ID());
});
add_action('wp_print_scripts', function () {
  if (get_field('custom_css', get_the_ID()))
    echo "<style>" .get_field('custom_css', get_the_ID()). "</style>";
});
