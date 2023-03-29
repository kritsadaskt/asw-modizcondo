<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AssetWise
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found text-center">
        <div class="container">
          <div class="error-404-image_wrapper col-sm-12 col-md-6 col-md-offset-3">
            <img src="<?=get_template_directory_uri() . '/images/asw_404_img.png';?>" alt="">
          </div>
          <div class="error-msg col-sm-12">
            <h2 class="error_txt text-center"><?php _e('ขออภัย หน้าเพจที่คุณเรียก<br class="visible-xs">ไม่พร้อมให้บริการในขณะนี้', 'Theme texts'); ?></h2>
            <p class="text-center">
              <?php
              $home_link = 'https://assetwise.co.th';
              if (get_locale() === 'en_US') {
                $home_link = $home_link . '?lang=en';
              }
              ?>
              <a href="<?=$home_link;?>" class="btn error_btn">
                <img src="<?=get_template_directory_uri() . '/images/404_left_arrow.png';?>" alt="">
                <?php _e('กลับหน้าแรก', 'Theme texts'); ?>
              </a>
            </p>
          </div>
        </div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
