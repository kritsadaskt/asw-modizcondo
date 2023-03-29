<?php
    $p = get_the_ID();
    $s = array_filter(explode("/", get_permalink()));
?>

<!-- Thank you Image Desktop -->
<a href="../" class="thank-you-image-d-wrapper text-center hidden-xs">
    <img src="<?php the_field('d_image', $p); ?>" alt="">
</a>
<!-- End -->

<!-- Thank you Image Mobile -->
<a href="../" class="thank-you-image-d-wrapper text-center visible-xs">
    <img src="<?php the_field('m_image', $p); ?>" alt="">
</a>
<!-- End -->

</div><!-- #primary -->

</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

<div style="display:none">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-85057478-8', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '734860609955637');
        fbq('addPixelId', '386398128470760');
        fbq('track', "PageView");
        fbq('track', 'CompleteRegistration');

    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=734860609955637&ev=PageView&noscript=1"/>
    </noscript>
  <noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=386398128470760&ev=PageView&noscript=1"/>
  </noscript>
    <!-- End Facebook Pixel Code -->
</div>

<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 902338991;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "NSghCP2FqW8Qr7OirgM";
    var google_remarketing_only = false;
    /* ]]> */
</script>

<script type="text/javascript"
        src="//www.googleadservices.com/pagead/conversion.js"></script>

<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//www.googleadservices.com/pagead/conversion/902338991/?label=NSghCP2FqW8Qr7OirgM&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>