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

<div class="container text-center">
  <!-- Thank you Image Desktop -->
  <a href="<?php echo $link; ?>" class="thank-you-image-d-wrapper text-center hidden-xs">
    <img src="<?php the_field('d_image', $p); ?>" alt="">
  </a>
  <!-- End -->

  <!-- Thank you Image Mobile -->
  <a href="<?php echo $link; ?>" class="thank-you-image-d-wrapper text-center visible-xs">
    <img src="<?php the_field('m_image', $p); ?>" alt="">
  </a>
  <!-- End -->
</div>

<!-- End Facebook Pixel Code -->
