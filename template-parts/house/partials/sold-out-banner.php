<?php
/**
 * Sold out Banner Partial
 */
$project_color = get_field('project_color');
$main_color = $project_color['main_color'];
$sold_out_group = get_field('sold_out_banner');
if($sold_out_group['sold_out_banner_image']) {
	$sold_out_image = $sold_out_group['sold_out_banner_image'];
}
if($sold_out_group['sold_out_text']) {
	$sold_out_text = $sold_out_group['sold_out_text'];
}
?>

<style>
	#sold-out-banner {
		background-color: <?php echo fadeColor($main_color, 0.85);  ?>;
	}
	@media (max-width: 480px) {
		#sold-out-banner {
			background-color: <?php echo $main_color;  ?>;
		}
	}
</style>

<div id="sold-out-banner">
	<img src="<?php echo $sold_out_image; ?>" alt="">
</div>
