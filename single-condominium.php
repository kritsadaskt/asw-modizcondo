<?php

$url = get_permalink();
$id = get_the_ID();
//print_r($id);
$postName    = array_filter( explode( "/", get_permalink() ) );
$projectName = $postName[ sizeof( $postName ) ];
$projectKey  = $postName[ sizeof( $postName ) - 1 ];

$page_style = get_field( 'project_color' );
$bg_color   = $page_style['page_background_color'];
get_header();
?>
<?php wp_body_open(); ?>
<?php if ( $bg_color !== '' ) : ?>
  <style>
    #primary {
      background-color: <?php echo $bg_color; ?>;
    }
  </style>
<?php endif; ?>
  <div id="primary" class="content-area condo">
  <?php
    if( ! empty($url) ) {

      $s = strpos($url, 'thank-you');
      //var_dump(!$s);

      if ($s) {
        $path = "/template-parts/condominium/thank-you.php";
        include( get_template_directory() . $path );
      } else {
        if ($id === 28131) {
          $part = '/template-parts/new-condominium/condominium-template.php';
          include( get_template_directory() . $part );
        } else {
          $part = '/template-parts/condominium/condominium-template.php';
          include(get_template_directory() . $part);
        }
      }
    } else {
      $path = "template-parts";
      get_template_part( $path, "content" );
    }
  ?>
<?php
get_sidebar();
get_footer();