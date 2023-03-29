<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AssetWise
 */

$url = get_permalink();
$postName    = array_filter( explode( "/", get_permalink() ) );
$projectName = $postName[ sizeof( $postName ) ];
$projectKey  = $postName[ sizeof( $postName ) - 1 ];

$page_style = get_field( 'project_color' );
$bg_color   = $page_style['page_background_color'];

get_header();

?>
<?php if ( $bg_color !== '' ) : ?>
  <style>
    #primary {
      background-color: <?php echo $bg_color; ?>;
    }
  </style>
<?php endif; ?>
  <div id="primary" class="content-area house">
  <?php
    if ( ! empty( $url ) ) {
	    $s = strpos($url, 'thank-you');
      if (!$s) {
        $part = '/template-parts/house/house-template.php';
        include( get_template_directory() . $part );
      } else {
        $path = "/template-parts/house/thank-you.php";
        include( get_template_directory() . $path );
      }
    } else {
      $path = "template-parts";
      get_template_part( $path, "content" );
    }
  ?>
<?php
get_sidebar();
get_footer();