<?php
/* Template name: Customer Care Thankyou */
header('refresh: 5; url=../index.php');
get_header();
?>

  <div id="customer-care">
    <section id="hero-image">
    </section>
    <div class="container-fluid nopadding sec-topicbar">
      <div class="container nopadding">
        <div class="col-xs-12 text-center">
          <div class="topicbar-left">
            ASSETWISE <span class="t-grey">Customer Care</span>
          </div>
          <div class="topicbar-right hidden-xxs">
            <img src="<?php echo get_template_directory_uri() ?>/images/customer-care/infobar-logo.png"/>
          </div>
        </div>
      </div>
    </div>
    <div id="cc-form" class="container">
      <div class="container text-center">
        <header class="page-header ">
          <img src="http://assetwise.co.th/migrate/wp-content/uploads/2017/09/cropped-logo.png" alt="">
          <h1 class="page-title"><?php echo __('เราได้รับรายงานของคุณแล้ว', 'Customer care'); ?></h1>
        </header>

        <div class="page-content">
          <h3><a href="../index.php"><?php echo __('กลับหน้าแรก', 'Customer care'); ?></a></h3>
        </div>
      </div>
    </div>
  </div>


<?php
get_sidebar();
get_footer();
