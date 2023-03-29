<?php
/* Template name: appeal form thank you */
header('refresh: 5; url=../index.php');
get_header();
?>
    <link href="<?php echo get_template_directory_uri() ?>/styles/appeal-form.css" rel="stylesheet" type="text/css" />
<!--    <link href="../wp-content/themes/assetwise/styles/appeal-form.css" rel="stylesheet" type="text/css" />-->
    <div id="appeal-form">
        <section id="hero-image">
        </section>
        <div class="container-fluid nopadding sec-topicbar">
            <div class="container nopadding">
                <div class="col-xs-12 text-center">
                    <div class="topicbar-left">
                        ASSETWISE <span class="t-grey">การกำกับดูแลกิจการที่ดี</span>
                    </div>
                    <div class="topicbar-right hidden-xxs">
                        <img src="<?php echo get_template_directory_uri() ?>/images/customer-care/infobar-logo.png" />
                    </div>
                </div>
            </div>
        </div>
        <div id="ap-form" class="container">
            <div class="container text-center">
                <header class="page-header ">
                    <img src="http://assetwise.co.th/migrate/wp-content/uploads/2017/09/cropped-logo.png" alt="">
                    <h1 class="page-title">เราได้รับเรื่องร้องเรียนของคุณแล้ว</h1>
                </header>

                <div class="page-content">
                    <h3><a href="../index.php">กลับหน้าแรก</a></h3>
                </div>
            </div>        </div>
    </div>




<?php
get_sidebar();
get_footer();
