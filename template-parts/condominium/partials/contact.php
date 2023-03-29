<?php
	/**
	 * Contact partial
	 */
//Section Styles
$project_color = get_field('project_color');
$main_color = $project_color['main_color'];

$form_group = get_field('condo_from_group');

$header_styles = get_field('contact_header_styles');
$header_color = $header_styles['title_color'];

$section_styles = get_field('contact_section_styles');
$bg_color = $section_styles['background_color'];
$bg_img = $section_styles['background_image'];

if($header_styles['title_underline_color'] !== '') {
	$header_underline_color = $header_styles['title_underline_color'];
} else {
	$header_underline_color = $main_color;
}

// Element
$contact_title = get_field('condo_contact_title');
$project_logo = get_field('condo_contact_logo');
$contact_address = get_field('condo_contact_address');
$contact_tel = get_field('condo_contact_tel');
$sale_map_url = get_field('condo_contact_sale_gallery');
$site_map_url = get_field('condo_contact_project_site');
$line_at = get_field('condo_contact_line_at');
$facebook = get_field('condo_contact_facebook');
$map_image = get_field('condo_contact_image_map');
if(get_field('contact_tel') !== '') {
	$tel = get_field('contact_tel');
} else {
  $tel =$form_group['condo_form_tel'];
}
$map_pre_text = get_field('map_pre_text');
?>

<style>
	#contact-section .inner .section-title {
		color: <?php echo $header_color; ?>;
	}
	#contact-section .inner {
		background-color: <?php echo $bg_color; ?>;
	}
	#contact-section .inner .section-title:before {
		border-color: <?php echo $header_underline_color; ?>;
	}
</style>

<section id="contact-section">
	<div class="container">
		<div class="row">
			<div class="inner">
				<h2 class="section-title text-center">
					<?php echo $contact_title; ?>
				</h2>
				<div class="contact-content">
					<div class="row">
						<div class="col-xs-12 col-sm-6 contact-side contact-right-side add-border-right">
							<div class="contact-info">
								<img class="contact-logo" src="<?php echo $project_logo; ?>">
								<p><?php echo $contact_address; ?></p>
                <?php if($tel) : ?>
								<a href="tel:<?php echo $tel; ?>" class="telbox">
									<i class="fa fa-phone-alt" aria-hidden="true"></i> <?php echo $tel; ?>
								</a>
                <?php endif; ?>
								<div class="social-btn-container">
									<?php if($sale_map_url) : ?>
										<a class="social-btn sale-site" target="_blank" href="<?php echo $sale_map_url; ?>">
                      <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 17px;margin-right: 3px;margin-bottom: -1px;"><path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/></svg> <?php echo __('Sales Gallery', 'Projects template texts'); ?>
										</a>
									<?php endif; ?>
									<?php if($site_map_url) : ?>
										<a class="social-btn project-site" target="_blank" href="<?php echo $site_map_url; ?>">
                      <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 12px;margin-right: 3px;height: 20px;margin-bottom: -5px;"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg> <?php echo __('Project Site', 'Projects template texts'); ?>
										</a>
									<?php endif; ?>
									<?php if($line_at) : ?>
										<a class="social-btn line-at" target="_blank" href="<?php echo $line_at; ?>">
                      <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 17px;margin-right: 3px;height: 20px;margin-bottom: -5px;"><path d="M256 8C118.941 8 8 118.919 8 256c0 137.058 110.919 248 248 248 52.925 0 104.68-17.078 147.092-48.319 5.501-4.052 6.423-11.924 2.095-17.211l-5.074-6.198c-4.018-4.909-11.193-5.883-16.307-2.129C346.93 457.208 301.974 472 256 472c-119.373 0-216-96.607-216-216 0-119.375 96.607-216 216-216 118.445 0 216 80.024 216 200 0 72.873-52.819 108.241-116.065 108.241-19.734 0-23.695-10.816-19.503-33.868l32.07-164.071c1.449-7.411-4.226-14.302-11.777-14.302h-12.421a12 12 0 0 0-11.781 9.718c-2.294 11.846-2.86 13.464-3.861 25.647-11.729-27.078-38.639-43.023-73.375-43.023-68.044 0-133.176 62.95-133.176 157.027 0 61.587 33.915 98.354 90.723 98.354 39.729 0 70.601-24.278 86.633-46.982-1.211 27.786 17.455 42.213 45.975 42.213C453.089 378.954 504 321.729 504 240 504 103.814 393.863 8 256 8zm-37.92 342.627c-36.681 0-58.58-25.108-58.58-67.166 0-74.69 50.765-121.545 97.217-121.545 38.857 0 58.102 27.79 58.102 65.735 0 58.133-38.369 122.976-96.739 122.976z"/></svg> <?php echo __('Line', 'Projects template texts'); ?>
										</a>
									<?php endif; ?>
									<?php if($facebook) : ?>
										<a class="social-btn facebook" target="_blank" href="<?php echo $facebook; ?>">
                      <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" style="width: 10px;margin-right: 3px;height: 16px;margin-bottom: -2px;"><path d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"/></svg> <?php echo __('Facebook', 'Projects template texts'); ?>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 contact-side">
							<h4 class="map-pre-text text-center"><?php echo $map_pre_text; ?></h4>
							<div id="showmap">
								<a class="map-container" href="<?php echo $map_image['url']; ?>">
                  <img class="contact-map" src="<?php echo $map_image['url']; ?>" alt="">
                  <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 15px;margin-right: 3px;"><path d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"/></svg>
									<?php echo __('คลิกที่ภาพเพื่อขยาย', 'Projects template texts'); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
