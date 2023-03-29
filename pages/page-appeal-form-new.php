<?php
/* Template name: Appeal Form New */
get_header();
?>
	<link href="<?php echo get_template_directory_uri() ?>/styles/appeal-form.css" rel="stylesheet" type="text/css"/>
	<div id="loader">
		<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
	</div>

	<div id="appeal-form">
		<section id="hero-image">
		</section>
		<div class="container-fluid nopadding sec-topicbar">
			<div class="container nopadding">
				<div class="col-xs-12 text-center">
					<div class="topicbar-left">
						<?php echo __('ASSETWISE <span class="t-grey">การกำกับดูแลกิจการที่ดี</span>', 'Theme texts'); ?>
					</div>
					<div class="topicbar-right hidden-xxs">
						<img src="<?php echo get_template_directory_uri() ?>/images/customer-care/infobar-logo.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="ap-form" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 id="headtext"><?php echo __('แจ้งเรื่องร้องเรียน เบาะแสการกระทําผิดและการทุจริตถึงประธานกรรมการตรวจสอบ
              ประธานเจ้าหน้าที่บริหาร ฝ่ายตรวจสอบภายใน', 'Appeal form page'); ?></h2>
					<hr>
					<p id="warning-message"><?php echo __('*กรุณากรอกข้อมูลให้ครบถ้วน ทั้งนี้บริษัทจะปกปิดสถานะของผู้แจ้งเบาะแสเป็นความลับ
              และมีมาตรฐานการคุ้มครองความปลอดภัย', 'Appeal form page'); ?></p>
				</div>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
<?php
get_sidebar();
get_footer();
