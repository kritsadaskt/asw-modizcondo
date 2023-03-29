<?php
	// Hero Banner
	$hb_is_active = get_field('condo_hb_active');
	if($hb_is_active) { include(get_template_directory().'/template-parts/condominium/partials/hero-banner.php'); }
	// Gallery
	$gallery_is_active = get_field('condo_active_galley');
	if($gallery_is_active) { include(get_template_directory().'/template-parts/condominium/partials/gallery.php'); }
	// Info Tabs
	$info_tabs_is_active = get_field('condo_active_info_tab');
	if($info_tabs_is_active) { include(get_template_directory().'/template-parts/condominium/partials/info-tabs.php'); }
	// Ads
	$ads_is_active = get_field('condo_active_ads');
	if($ads_is_active) { include(get_template_directory().'/template-parts/condominium/partials/ads.php'); }
	// Video
	$video_is_active = get_field('condo_active_video');
	if($video_is_active) { include(get_template_directory().'/template-parts/condominium/partials/video.php'); }
	// Floor Plan
	$floor_plan_is_active = get_field('condo_active_floor_plan');
	if($floor_plan_is_active) { include(get_template_directory().'/template-parts/condominium/partials/floor-plan.php'); }
	//360 View
	$view_Link = get_field('360_views_url');
	if($view_Link) { include (get_template_directory().'/template-parts/condominium/partials/360-view.php'); }
	//Video Drone
	$drone_Link = get_field('video_drone');
	if($drone_Link['url']) { include (get_template_directory().'/template-parts/condominium/partials/video-drone.php'); }
	// Project Progress
	$progress_is_active = get_field('condo_active_progress');
	if($progress_is_active) { include(get_template_directory().'/template-parts/condominium/partials/project-progress.php'); }
	// Custom Block
	$custom_block_is_active = get_field('condo_active_custom_block');
	if($custom_block_is_active) { include(get_template_directory().'/template-parts/condominium/partials/custom-block.php'); }
	// Contact
	$contact_is_active = get_field('condo_active_contact');
	if($contact_is_active) { include(get_template_directory().'/template-parts/condominium/partials/contact.php'); }
?>