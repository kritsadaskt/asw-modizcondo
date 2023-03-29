<?php

add_shortcode('icon_listed', function () {
  $icon_list = get_field('icon_listed', get_the_ID());
  echo '<div class="icon_listed">';
  echo '<div class="col-md-8 col-md-offset-2">';
  echo '<div class="row">';
  foreach ($icon_list as $icon) :
    $offset = '';
    if ($icon['offset']) :
      $offset = ' col-md-offset-' . $icon['offset'];
    endif;
    echo '<div class="icon col-xs-4 col-sm-3'.$offset.'">';
    echo '<img class="icon-img" src="'.$icon['icon_image'].'" alt="">';
    echo '<h4 class="icon-title">'.$icon['icon_text'].'</h4>';
    echo '</div>';
  endforeach;
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '<p class="visible-xs text-center btn-icon-load-more"><button id="load_icon_more" class="btn">แสดงเพิ่มเติม</button></p>';
});

add_shortcode('floor_plan', function () {
  include get_template_directory() . '/template-parts/shortcode/floor_plan.php';
});