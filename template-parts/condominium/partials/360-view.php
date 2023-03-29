<?php
	$header_styles = get_field('floor_unit_plan_header_styles');
	$main_color = $project_color['main_color'];
	if($header_styles['text_underline_color'] !== '') {
		$header_underline_color = $header_styles['text_underline_color'];
	} else {
		$header_underline_color = $main_color;
	}
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
					<?php echo __('Virtual tour', 'Projects template texts'); ?>
				</h2>
			</div>
			<iframe src="<?php echo get_field('360_views_url', get_the_ID()); ?>"></iframe>
		</div>
	</div>
</section>