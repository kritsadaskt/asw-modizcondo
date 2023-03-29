<?php
/* Template name: House and Townhome */
get_header();
$p            = get_the_ID();
$heroBanners  = acf_photo_gallery( 'hero_sliders', $p );
$house_listed = get_field( 'house_projects_selector', $p );
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
	echo "<section id='hero-image'><img src='" . $heroBanners[0]['full_image_url'] . "' alt=''></section>";
}
?>
  <div class="sec-topicbar">
    <div class="container">
      <div class="topicbar-left">
        <?php echo __('<span class="t-grey">บ้านและทาวน์โฮม จาก</span> ASSETWISE', 'Theme texts'); ?>
      </div>
      <div class="topicbar-right hidden-xxs">
        <img src="<?php echo get_template_directory_uri() ?>/images/condominium/infobar-logo.png"/>
      </div>
    </div>
  </div>
  <section>
    <div class="container">
      <div id="house-listed" class="row">
				<?php foreach ( $house_listed as $item ) : ?>
					<?php require 'parts/project-item.php'; ?>
				<?php endforeach; ?>
      </div>
    </div>
  </section>

<?php
get_sidebar();
get_footer();
