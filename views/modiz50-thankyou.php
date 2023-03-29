<?php
/*
Template Name: Modiz Sukhumvit 50 Thank you
Template Post Type: condominium
*/

get_header(); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Taviraj&display=swap');
</style>
<?php wp_body_open(); ?>

<?php the_content(); ?>
<section id="thank-you">
  <div class="container">
    <div class="row">
      <div class="left col-xs-12 col-sm-5 hidden-xs">
        <h3 class="left-txt text-center">
          NEW HIGH RISE CONDO<br>
          ON SUKHUVIT 50
        </h3>
      </div>
      <div class="right col-xs-12 col-sm-7">
        <div class="thank-you-text-box">
          <h3 class="thank-you-text-title">ขอบคุณสำหรับการลงทะเบียน</h3>
          <img class="thank-you-text-box-logo" src="https://modizcondo.com/wp-content/uploads/2021/07/modiz50-logo-white.png" alt="Modiz Sukhumvit 50">
          <p class="thank-you-text-sub">เจ้าหน้าที่จะทำการติดต่อกลับ<br>
            เพื่อยืนยันสิทธ์ในการรับสิทธิพิเศษจากทางโครงการ</p>
          <p class="text-center">
            <a href="https://line.me/R/ti/p/%40modiz50" title="Line @Modiz50" target="_blank">
              <img src="https://modizcondo.com/wp-content/uploads/2021/07/modiz50-line-btn-rv1.png" alt="Line @Modiz50" width="150px">
            </a>
          </p>
          <p>
            <a href="/condominium/modiz-sukhumvit50" target="_blank" title="<?php _e('กลับหน้าหลัก', 'Modiz 50'); ?>" class="back-to-modiz50 text-center">
              <?php _e('กลับหน้าหลัก', 'Modiz 50'); ?>
            </a>
          </p>
        </div>
      </div>
      <div class="left col-xs-12 col-sm-5 visible-xs">
        <h3 class="left-txt text-center">
          NEW HIGH RISE CONDO<br>
          ON SUKHUVIT 50
        </h3>
      </div>
    </div>
  </div>
</section>
<?php
get_sidebar();
get_footer();
