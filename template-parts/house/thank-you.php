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

<!-- Thank you Image Desktop -->
<div class="container">
  <a href="<?php echo $link; ?>" target="_blank" class="thank-you-image-d-wrapper text-center hidden-xs">
    <img src="<?php the_field('d_image', $p); ?>" alt="">
  </a>
</div>
<!-- End -->

<!-- Thank you Image Mobile -->
<a href="<?php echo $link; ?>" target="_blank" class="thank-you-image-d-wrapper text-center visible-xs">
    <img src="<?php the_field('m_image', $p); ?>" alt="">
</a>
<!-- End -->

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','//connect.facebook.net/en_US/fbevents.js');

  fbq('init', '386398128470760');
  fbq('track', "PageView");
  fbq('track', 'CompleteRegistration');

</script>
<noscript>
  <img height="1" width="1" style="display:none"
       src="https://www.facebook.com/tr?id=386398128470760&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->