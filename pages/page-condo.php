<?php
/* Template name: Condominium */
get_header();
$p           = get_the_ID();
$heroBanners = acf_photo_gallery( 'hero_sliders', $p );
$project_items = get_field('page_projects', $p);
$new_projects = $project_items['new_projects'];
$ready_to_move_in_projects = $project_items['ready_to_move_in_projects'];
?>

<?php
if ( count( $heroBanners ) > 1 ) {
	echo "<section id='top-slider'>";
	foreach ( $heroBanners as $bannerItem ) {
		echo "<div class='banner-item'>";
		echo "<a href='" . $bannerItem['url'] . "'>";
		echo "<img src='" . $bannerItem['full_image_url'] . "' alt=''></a>";
		echo "</div>";
	}
	echo "</section>";
} else {
	echo "<section id='hero-image' style='background-image:url(" . $heroBanners[0]['full_image_url'] . ");'></section>";
}
?>
  <div class="sec-topicbar">
    <div class="container nopadding">
      <div class="col-xs-12 text-center">
        <div class="topicbar-left">
          <?php echo __('<span class="t-grey">คอนโดจาก</span> ASSETWISE', 'Condominium Page texts'); ?>
        </div>
        <div class="topicbar-right hidden-xs">
          <img alt="" src="<?php echo get_template_directory_uri() ?>/images/condominium/infobar-logo.png"/>
        </div>
      </div>
    </div>
  </div>
  <section>
    <div class="container no-padding-xs">
      <div class="mobile-header visible-xs">
        <div class="navbar-header">
          <span class="menu-title"><?php echo __('ค้นหาโครงการ', 'Condominium Page texts'); ?></span>
          <button type="button" class="navbar-toggle" data-toggle="collapse"
                  data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </div>
      <!-- Nav Pills -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul id="condo_nav" class="nav nav-pills nav-justified">
          <li class="active">
            <a id="new_project_menu" data-toggle="pill" href="#new_projects">
              <?php echo __('โครงการใหม่', 'Condominium Page texts'); ?>
            </a></li>
          <li>
            <a id="ready_menu" data-toggle="pill" href="#ready_to_move_in">
              <?php echo __('โครงการพร้อมอยู่', 'Condominium Page texts'); ?>
            </a></li>
          <li>
            <a id="filter_menu" data-toggle="pill" href="#filter_area" class="filter_menu">
              <?php echo __('ทำเลที่ต้องการ', 'Condominium Page texts'); ?>
            </a></li>
          <li>
            <a id="our_project_menu" data-toggle="pill" href="#our_projects" class="filter_menu">
              <?php echo __('โครงการของเรา', 'Condominium Page texts'); ?>
            </a></li>
        </ul>
      </div>
      <!-- Tab Content -->
      <div class="tab-content">
        <div id="new_projects" class="condo tab-pane active">
          <!-- Desktop Project List -->
          <div class="desktop-list">
	          <?php foreach ($new_projects as $item) : ?>
		          <?php require 'parts/project-item.php'; ?>
	          <?php endforeach; ?>
          </div>
        </div>

        <div id="ready_to_move_in" class="condo tab-pane">
          <!-- Desktop Project List -->
          <div class="desktop-list">
	          <?php foreach ($ready_to_move_in_projects as $item) : ?>
		          <?php require 'parts/project-item.php'; ?>
	          <?php endforeach; ?>
          </div>
        </div>

        <div id="filter_area" class="condo tab-pane">
          <div class="filter_area_pane">
            <div class="close">
              <i class="fa fa-times"></i>
            </div>
            <h3 class="text-center">
              <?php echo __('เลือกทำเลที่ต้องการ', 'Condominium Page texts'); ?>
            </h3>
            <div class="options-wrapper">
							<?php
							$locations = post_type_tags( 'condominium' );
							foreach ( $locations as $location ) {
								//Case EN
								if (get_bloginfo('language') === 'en-US') {
									if (strpos($location->slug, '-en') !== false) {
										echo show_project_checkbox($location);
									}
								}
                //Case CN
								else if (get_bloginfo('language') === 'zh-CN') {
									if (strpos($location->slug, '-zh-hans') !== false) {
										echo show_project_checkbox($location);
									}
								}
								//Case TH
								else {
									if (strpos($location->slug, '-en') === false && strpos($location->slug, '-zh-hans') === false) {
										echo show_project_checkbox($location);
									}
								}
							}
							?>
            </div>
            <div class="filter_area_submit_pane text-center">
              <button id="filter_area_submit_btn" type="button">
                <?php echo __('ค้นหา', 'Condominium Page texts'); ?>
              </button>
            </div>
          </div>
          <!-- Desktop Project List -->
          <div class="desktop-list">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php require 'parts/project-item.php'; ?>
						<?php endwhile; ?>
          </div>
        </div>
        <div id="our_projects" class="condo tab-pane">
          <!-- Desktop Project List -->
          <div class="filter_area_pane">
            <div class="close">
              <i class="fa fa-times"></i>
            </div>
            <h3 class="text-center">
              <?php echo __('โครงการของเรา', 'Condominium Page texts'); ?>
            </h3>
            <div class="logo-slider">
							<?php
							//print_r(get_field('condo_brand_listed', $p));
							if ( have_rows( 'condo_brand_listed', $p ) ) {
								while ( have_rows( 'condo_brand_listed', $p ) ) : the_row();
									$key   = get_sub_field( 'brand_name' );
									$image = get_sub_field( 'brand_logo' );
									echo "<img src='" . $image . "' alt='' data-name='" . $key . "'>";
								endwhile;
							}
							?>
            </div>
          </div>
          <div class="desktop-list">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php require 'parts/project-item.php'; ?>
						<?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_sidebar();
get_footer();
