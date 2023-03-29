<?php
/* Template name: Campaign Thank you*/
get_header();
$p = get_the_ID();
?>

  <div class="container">
    <!-- Thank you Image Desktop -->
    <a href="<?php the_field('link', $p); ?>" class="thank-you-image-d-wrapper text-center hidden-xs">
      <img src="<?php the_field('d_image', $p); ?>" alt="">
    </a>
    <!-- End -->

    <!-- Thank you Image Mobile -->
    <a href="<?php the_field('link', $p); ?>" class="thank-you-image-d-wrapper text-center visible-xs">
      <img src="<?php the_field('m_image', $p); ?>" alt="">
    </a>
    <!-- End -->
  </div>

  <noscript>
    <img alt="" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=386398128470760&ev=CompleteRegistration&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->

<?php
get_sidebar();
get_footer();
