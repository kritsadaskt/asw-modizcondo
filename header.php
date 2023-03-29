<?php
  $tpl_dir = get_template_directory_uri();
  if (isset($_GET['utm_source']) === false) {
    $ref = 'Direct';
  } else {
    $ref = $_GET['utm_source'];
  }
  $p = get_the_ID();
  global $post;
  $content = $post->post_content;
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><!--<![endif]-->
<html <?php language_attributes(); ?> class="no-js">
<head>
  <title><?php the_title(); ?></title>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=10,9"/>
  <meta http-equiv="Cache-Control" content="no-store"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=1.0"/>
  <meta name="google-site-verification" content="RiX97hJzHK94CBAw_VQRM01eEwT81w0wZU6PLtMGQ2E"/>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.ico"/>
  <?php wp_head(); ?>
  <?php if(ICL_LANGUAGE_CODE=='zh-hans') : ?>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri() ?>/styles/cn.css" rel="stylesheet">
  <?php endif; ?>
  <?php if (get_field('custom_css', get_the_ID())) : ?>
    <style>
      <?php echo get_field('custom_css', get_the_ID()); ?>
    </style>
  <?php endif; ?>
  <?php if (get_field('enable_live_chat_button')) : ?>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
    <div class='fb-customerchat'
         attribution="wordpress"
         page_id='525891810931056'
         logged_in_greeting='AssetWise สวัสดีค่ะ'
         logged_out_greeting='AssetWise สวัสดีค่ะ'>
    </div>
  <?php endif; ?>
</head>

<body <?php page_id(); body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">
      <?php esc_html_e('Skip to content', 'assetwise'); ?>
    </a>
    <header id="masthead" class="site-header">
      <div class="line-1">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 hidden-xs">
              <?php $project_iden = get_field('page_identities'); ?>
              <?php if ($project_iden) : ?>
                <img id="projectLogo" src="<?=$project_iden['project_logo'];?>" alt="">
              <?php endif; ?>
            </div>
            <div class="col-xs-7 col-sm-4 logo-wrapper text-center">
              <?php the_custom_logo(); ?>
            </div>
            <div class="col-xs-5 col-sm-4">
            <div class="top-right-social">
              <?php if (function_exists('icl_get_languages')) : ?>
                <div id="language-switcher" class="hidden-xs">
                  <?php require 'template-parts/language-switcher.php'; ?>
                </div>
              <?php endif; ?>
              <a id="line-at-btn" target="_blank" href="https://line.me/R/ti/p/%40assetwise">
                <img src="<?php echo get_template_directory_uri() . '/images/ico/asw_line-btn.png'; ?>" alt="">
              </a>
              <a id="facebook-link" target="_blank" href="https://www.facebook.com/AssetWiseThailand/">
                <img src="<?php echo get_template_directory_uri() . '/images/ico/asw_fb-btn.png'; ?>" alt="">
              </a>
              <a class="menu-toggle">
                <img src="<?php echo get_template_directory_uri() . '/images/ico/asw_menu-toggle.png'; ?>" alt="">
              </a>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="line-2">
        <div class="container">
          <div class="row">
            <div id="main-nav" class="col-sm-12">
              <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'menu-1',
                  'menu_id' => 'primary-menu',
                ));
                ?>
              </nav><!-- #site-navigation -->
              <?php if (function_exists('icl_get_languages')) : ?>
                <div id="language-switcher-mob" class="visible-xs">
                  <?php require 'template-parts/language-switcher.php'; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </header><!-- #masthead -->
    <div id="header-space"></div>
    <div class="loading">
      <div class="lds-spinner">
        <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    <div id="content" class="site-content">
