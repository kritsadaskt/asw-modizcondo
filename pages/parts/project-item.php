<div class="project col-sm-6 col-md-4">
    <?php
      if(get_field('ex_link')) {
          $link = get_field('ex_link');
      } else if(get_post_type() === "home"){
          $link = get_site_url();
      } else {
          $link = get_permalink();
      }

      //get ID
      $id = $item->ID;
      $item_basic_detail = '';

      if (get_field('project_name', $id) && get_field('project_location', $id) && get_field('project_description', $id)) {
        $pName = get_field('project_name', $id);
        $pLoc = get_field('project_location', $id);
        $pDesc = get_field('project_description', $id);
      } else {
        if (get_field('project_information', $id)) {
          $item_basic_detail = get_field('project_information', $id);
          if ($item_basic_detail['project_name'] === '') {
            $item_basic_detail = get_field('project_informations', $id);
          }
        } else {
          $item_basic_detail = get_field('project_informations', $id);
        }
        $pName = $item_basic_detail['project_name'];
        $pLoc = $item_basic_detail['project_location'];
        $pDesc = $item_basic_detail['project_short_description'];
      }
    ?>
    <a class="item-wrapper" target="_blank" href="<?php echo get_the_permalink($id); ?>" title="<?php the_title(); ?>">
        <div class="item-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url($id); ?>');"></div>
        <div class="item-detail text-center">
            <h4><?php echo $pName; ?></h4>
            <p class="location"><?php echo $pLoc; ?></p>
            <p class="project-desc"><?php echo $pDesc; ?></p>
        </div>
    </a>
</div>