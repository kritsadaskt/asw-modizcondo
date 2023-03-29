<?php
  $id = get_the_ID();
	$header_styles = get_field('floor_unit_plan_header_styles', $id);
	$main_color = $project_color['main_color'];
	if($header_styles['text_underline_color'] !== '') {
		$header_underline_color = $header_styles['text_underline_color'];
	} else {
		$header_underline_color = $main_color;
	}
	$video_drone = get_field('video_drone', $id);
?>
<style>
	#video-drone .section-title:before {
		border-color: <?php echo $header_underline_color; ?>;
	}
</style>

<section id="video-drone" class="wrap">
	<div class="container">
		<div class="row" style="margin-bottom: -8px">
			<div class="inner">
				<h2 class="section-title text-center">
					<?php echo __('Video Drone', 'Projects template texts'); ?>
				</h2>
			</div>
			<iframe src="<?php echo $video_drone['url']; ?>"></iframe>
		</div>
	</div>
</section>
