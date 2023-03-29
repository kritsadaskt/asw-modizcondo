<?php
/**
 * Created by PhpStorm.
 * Date: 26/8/2018 AD
 */
 $p = get_the_ID();
 $s = array_filter(explode("/", get_permalink()));
 if(get_field('link', $p)) {
	 $link = get_field('link', $p);
 } else {
   $link = 'http://assetwise.co.th';
 }
?>
<style>
    .no-padding {
        padding: 0;
    }
</style>
<div class="container<?php echo get_field('full_width_page', $p) ? '-fluid no-padding' : '';?> text-center">
  <div class="row-no-gutters">
    <div class="col-sm-12">
      <!-- Thank you Image Desktop -->
      <a href="<?php echo $link; ?>" class="thank-you-image-d-wrapper text-center hidden-xs" target="_blank">
        <img src="<?php the_field('d_image', $p); ?>" alt="">
      </a>
      <!-- End -->

      <!-- Thank you Image Mobile -->
      <a href="<?php echo $link; ?>" class="thank-you-image-d-wrapper text-center visible-xs" target="_blank">
        <img src="<?php the_field('m_image', $p); ?>" alt="">
      </a>
      <!-- End -->
    </div>
  </div>
</div>

<!-- End Facebook Pixel Code -->
