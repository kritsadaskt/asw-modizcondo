<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AssetWise
 */
$heroBanners = acf_photo_gallery('hero_sliders', get_the_ID());
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
<div class="sec-topicbar">
	<div class="container">
		<div class="topicbar-left">
			<?php the_title(); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="page-content-wrapper col-sm-12">
			<?php the_content(); ?>
		</div>
	</div>
</div>
