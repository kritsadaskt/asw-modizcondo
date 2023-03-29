<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AssetWise
 */
$tpl_dir = get_template_directory_uri();
$p       = get_the_ID();
?>

</div><!-- #content -->

<section id="footer-nav">
  <div class="site-map-nav">
    <button id="toggle-site-map">
      Sitemap
    </button>
  </div>
  <div id="footer-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-sm-2 menu-1">
          <div class="footer-menu-title">
            <h4>AssetWise</h4>
          </div>
          <div class="footer-menu-wrapper">
            <?php
            wp_nav_menu(array(
              'menu' => 'footer-menu-1'
            ));
            ?>
          </div>
          <div class="footer-menu-title">
            <h4><?php _e('อื่นๆ', 'assetwise-footer'); ?></h4>
          </div>
          <div class="footer-menu-wrapper">
            <?php
            wp_nav_menu(array(
              'menu' => 'footer-menu-2'
            ));
            ?>
          </div>
        </div>
        <div class="our-projects col-sm-5 menu-2">
          <div class="footer-menu-title">
            <h4><?php _e('โครงการของเรา', 'assetwise-footer'); ?></h4>
          </div>
          <div class="row">
            <div class="footer-condo-menu-1 col-xs-6">
              <h5 class="footer-project-title"><?php _e('คอนโดมิเนียม', 'assetwise-footer'); ?></h5>
              <div class="footer-menu-wrapper">
                <?php
                wp_nav_menu(array(
                  'menu' => 'footer-condo-menu-1'
                ));
                ?>
              </div>
            </div>
            <div class="footer-condo-menu-2 col-xs-6">
              <div class="footer-menu-wrapper">
                <?php
                wp_nav_menu(array(
                  'menu' => 'footer-condo-menu-2'
                ));
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="house-menu col-sm-2 menu-3">
          <h5 class="footer-project-title"><?php _e('บ้านและทาวน์โฮม', 'assetwise-footer'); ?></h5>
          <div class="footer-menu-wrapper">
            <?php
            wp_nav_menu(array(
              'menu' => 'footer-house-menu'
            ));
            ?>
          </div>
          <a id="footer-loan-calc" style="margin-top: 15px;" href="https://assetwise.co.th/pre-approved/" target="_blank" title="<?php _e('คำนวนความสามารถในการกู้');?>">
            <img src="https://assetwise.co.th/migrate/wp-content/uploads/2021/03/loan_calc_btn-svg.svg" alt="<?php _e('คำนวนความสามารถในการกู้');?>">
          </a>
        </div>
        <div class="col-sm-3 menu-4">
          <div class="footer-menu-title">
            <h4 class="line-red"><?php _e('ช่องทางการติดต่อ', 'assetwise-footer'); ?></h4>
          </div>
          <div class="footer-contact-wrapper">
            <p>
              <a href="https://www.youtube.com/channel/UCI_7R29HhJfBPbBiJ65GxfQ" title="Youtube" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/images/ico/footer-yt.jpg'; ?>" alt="">
              </a>
              <a href="line://ti/p/@lxt4528z" title="Line@" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/images/ico/footer-line.jpg'; ?>" alt="">
              </a>
              <a href="https://www.instagram.com/assetwisethailand/" title="Instagram" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/images/ico/footer-ig.jpg'; ?>" alt="">
              </a>
            </p>
            <div class="footer-call">
	            <?php _e('ติดต่อโทร', 'assetwise-footer'); ?>
              <a href="tel:021680000" title="<?php _e('ติดต่อโทร', 'assetwise-footer'); ?>">02-168-0000</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer id="colophon" class="site-footer">
  <a id="back-to-top" href="#" title="Back to top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 30px;margin-top: 5px;"><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg>
  </a>
  <div class="container">
    <a id="footer-tel" href="tel:021680000" title="ติดต่อเรา">
      <img src="<?php echo $tpl_dir; ?>/images/footer-tel.svg" alt="">
      <span>02-168-0000</span>
    </a>
    <div class="bottom-right-social pull-right">
      <a id="youtube-link" target="_blank" href="https://www.youtube.com/channel/UCI_7R29HhJfBPbBiJ65GxfQ"></a>
      <a id="line-at-link" target="_blank" href="https://line.me/R/ti/p/%40assetwise"></a>
      <a id="ig-link" target="_blank" href="https://www.instagram.com/assetwisethailand/"></a>
    </div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
<?php
if (get_field('scripts', $p)) {
  echo get_field('scripts', $p);
}
if ( get_field( 'footer_code', $p ) ) {
	echo get_field( 'footer_code', $p );
}
?>

</html>
