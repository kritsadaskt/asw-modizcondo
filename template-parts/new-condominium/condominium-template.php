<?php $page_ident = get_field('page_identities', get_the_ID()); ?>
<style>
    h2.section-title span.title {
        color: <?=$page_ident['main_color']?>;
        border-left: 4px solid <?=$page_ident['main_color']?>;
        border-right: 4px solid <?=$page_ident['main_color']?>;
    }
</style>
<?php
include "partials/_hero-banner.php";
include "partials/_register-box.php";
include "partials/_project-concept.php";
if (get_the_ID() === 29543 || get_the_ID() === 30359) {
  include "partials/_project-details2.php";
} else {
  include "partials/_project-details.php";
}
include "partials/_facility.php";
// 39575 : Modiz 50 TH
// 42472 : Modiz 50 EN
// 42613 : Modiz 50 CN
if (get_the_ID() === 39575 || get_the_ID() === 42472 || get_the_ID() === 42613) {
  $path = get_template_directory() . '/views/modiz50-floorplans.php';
  include $path;
} else if(get_the_ID() === 39992 || get_the_ID() === 19279 || get_the_ID() === 42472 || get_the_ID() === 42114) {
  $path = get_template_directory() . '/views/modiz-bangpho-floorplans.php';
  include $path;
} else {
  include "partials/_floor-plan.php";
}
if(get_the_ID() === 39992 || get_the_ID() === 19279 || get_the_ID() === 42114) {
  $path = get_template_directory() . '/views/modiz-bangpho-medias.php';
  include $path;
} else {
  include "partials/_video.php";
}
include "partials/_gallery.php";
include "partials/_project-progress.php";
include "partials/_location.php";
include "partials/_custom-html.php";