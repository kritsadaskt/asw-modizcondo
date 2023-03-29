<?php
/* Template name: Contact */
get_header();
$p           = get_the_ID();
$heroBanners = acf_photo_gallery( 'hero_sliders', $p );
?>
<?php
if ( count( $heroBanners ) > 1 ) {
	echo "<section id='top-slider'>";
	foreach ( $heroBanners as $bannerItem ) {
		echo "<div class='banner-item'>";
		echo "<img src='" . $bannerItem['full_image_url'] . "' alt=''>";
		echo "</div>";
	}
	echo "</div>";
} else {
	echo "<section id='hero-image' style='background-image:url(" . $heroBanners[0]['full_image_url'] . "); margin-bottom: 0;'></section>";
}
?>
  <div class="container-fluid nopadding sec-topicbar">
    <div class="container nopadding">
      <div class="col-xs-12 text-center">
        <div class="topicbar-left">
          <?php echo __('<span class="t-grey">ติดต่อ</span> ASSETWISE', 'Theme texts'); ?>
        </div>
        <div class="topicbar-right hidden-xxs">
          <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/contact-infobar-logo.png">
        </div>
      </div>
    </div>
  </div>
  <section class="contact-content">
    <div class="container">
      <div class="row">
        <div class="maps col-sm-7">
          <div id="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3873.358241736782!2d100.61678941465861!3d13.877514998107086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e282a82529496f%3A0x61d802c580d2ac54!2sassetwise!5e0!3m2!1sen!2sth!4v1525017153013"
                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="address col-sm-5">
          <p class="addr">
						<?php echo get_field( 'address', $p ); ?>
          </p>
          <p class="tel">
						<?php echo get_field( 'tel_1', $p ); ?>
            <br>
						<?php echo get_field( 'tel_2', $p ); ?>
          </p>
          <p class="fax">
						<?php echo get_field( 'fax', $p ); ?>
          </p>
          <p class="mail">
            <a title="contact Assetwise" href="mailto:<?php echo get_field( 'email', $p ); ?>">
							<?php echo get_field( 'email', $p ); ?>
            </a>
          </p>
          <p class="social-link">
            <a href="<?php the_field( 'facebook_link', $p ); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/fb_btn.png" alt="Facebook">
            </a>
            <a href="<?php the_field( 'youtube_link', $p ); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/youtube_btn.png" alt="Youtube">
            </a>
            <a href="<?php the_field( 'line_link', $p ); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/line_btn.png" alt="Line">
            </a>
          </p>
          <div class="btn-contact-group text-left">
            <button data-toggle="modal" data-target="#appeal-modal" class="btn btn-primary btn-lg">
              <?php echo __('ติดต่อ AssetWise', 'Contact page'); ?>
            </button>
          </div>
          <div class="btn-contact-group text-left">
            <button onclick="window.open('<?php echo get_page_link('27550'); ?>', '_blank')" class="btn btn-primary btn-lg">
              <?php echo __('ร้องเรียนธรรมาภิบาล', 'Contact page'); ?>
            </button>
          </div>
          <div class="btn-contact-group text-left">
            <button onclick="window.open('<?php echo get_page_link('38294'); ?>', '_blank')" class="btn btn-primary btn-lg">
              <?php echo __('ติดต่อผู้คุ้มครองข้อมูลส่วนบุคคล', 'Contact page'); ?>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="section-separator"></div>
  </section>

  <div id="appeal-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <h3 class="appeal-modal-title text-center">
          <?php echo __('ช่องทางการร้องเรียน<br>แจ้งเบาะแสการกระทำผิด การทุจริตคอร์รัปชั่น/ขอความเป็นธรรม', 'Contact page'); ?>
          </h3>
          <div class="contact-box-wrapper">
            <a href="<?php echo get_page_link('27550'); ?>" title="<?php echo __('ส่งเรื่องร้องเรียนขอความเป็นธรรม', 'Contact page'); ?>">
              <div class="contact-box website">
              <div class="icon-wrapper left">
                <div class="icon web"></div>
              </div>
              <div class="text right">
                <span class="address">www.assetwise.co.th</span>
              </div>
            </div>
            </a>
            <a href="mailto:cg@assetwise.co.th" title="<?php echo __('ส่งอีเมลร้องเรียนขอความเป็นธรรม', 'Contact page'); ?>">
                <div class="contact-box email">
                <div class="icon-wrapper left">
                  <div class="icon email"></div>
                </div>
                <div class="text right">
                  <span class="address">CG@assetwise.co.th</span>
                </div>
              </div>
            </a>
            <div class="contact-box letter">
              <div class="icon-wrapper left">
                <div class="icon envelope"></div>
              </div>
              <div class="text right">
                <div class="text-box">
                  <p><strong>บริษัท แอสเซทไวส์ จำกัด (มหาชน) (สำนักงานใหญ่)</strong></p>
                  <p>9 ซอย รามอินทรา 5 แยก 23 แขวงอนุสาวรีย์ เขต บางเขน กรุงเทพมหานคร 10220</p>
                  <p><strong>ส่งจดหมายปิดผนึกส่งตรงถึงผู้รับข้อร้องเรียน</strong></p>
                  <ul>
                    <li><a href="mailto:kriengkrai.cg@assetwise.co.th" title="ประธานกรรมการตรวจสอบ">ประธานกรรมการตรวจสอบ</a></li>
                    <li><a href="mailto:kromchet.cg@assetwise.co.th" title="ประธานเจ้าหน้าที่ บริหาร">ประธานเจ้าหน้าที่ บริหาร</a></li>
                    <li><a href="mailto:chalermchai@assetwise.co.th" title="หัวหน้างานตรวจสอบภายใน">หัวหน้างานตรวจสอบภายใน</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr>

          <div class="disclaimer">
            <div class="row">
              <div class="col-sm-12">
                <p><?php echo __('<strong>หมายเหตุ : </strong> กรณีแจ้งข้อร้องเรียนทุจริตคอร์รัปชั่น สามารถส่งอีเมลตรงถึงผู้รับเรื่องร้องเรียนได้ ดังนี้', 'Contact page'); ?></p>
                <p>ประธานกรรมการตรวจสอบ <a href="mailto:kriengkrai.cg@assetwise.co.th">kriengkrai.cg@assetwise.co.th</a></p>
                <p>ประธานเจ้าหน้าที่บริหาร <a href="mailto:kromchet.cg@assetwise.co.th">kromchet.cg@assetwise.co.th</a></p>
                <p>หัวหน้างานตรวจสอบภายใน <a href="mailto:chalermchai@assetwise.co.th">chalermchai@assetwise.co.th</a></p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-center">
                <a id="to-appeal-form" class="btn" href="https://assetwise.co.th/appeal-form-V2" target="_blank">ติดต่อ แจ้งเรื่อง</a>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?php
get_sidebar();
get_footer();
