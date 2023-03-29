<?php
  $id = get_the_ID();
	$header_styles = get_field('houseplan_header_styles');
  $project_color = get_field('project_color', $id);
	$main_color = $project_color['main_color'];
	if($header_styles['title_underline_color'] !== '') {
		$header_underline_color = $header_styles['title_underline_color'];
	} else {
		$header_underline_color = $main_color;
	}
  $virtual_video = get_field('virtual_tour_video_drone');
?>

<style>
	#virtual-tour .section-title:before {
		border-color: <?php echo $header_underline_color; ?>;
	}
</style>

<section id="virtual-tour" class="wrap">
	<div class="container">
		<div class="row" style="margin-bottom: -8px">
			<div class="inner">
				<h2 class="section-title text-center">
					<?php echo $virtual_video['vt_title']?$virtual_video['vt_title']:'Virtual tour'; ?>
				</h2>
			</div>
			<iframe src="<?php echo $virtual_video['vt_url']; ?>"></iframe>
		</div>
	</div>
</section>