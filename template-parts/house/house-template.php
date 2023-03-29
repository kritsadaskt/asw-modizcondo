<?php
	// Hero Banner
	$virtual_video = get_field('virtual_tour_video_drone');
	$hb_is_active = get_field('house_hb_active');
	if($hb_is_active) { include(get_template_directory().'/template-parts/house/partials/hero-banner.php'); }
	// Gallery
	$gallery_is_active = get_field('house_active_galley');
	if($gallery_is_active) { include(get_template_directory().'/template-parts/house/partials/gallery.php'); }
	// Info Tabs
	$info_tabs_is_active = get_field('house_active_info_tab');
	if($info_tabs_is_active) { include(get_template_directory().'/template-parts/house/partials/info-tabs.php'); }
	// Ads
	$ads_is_active = get_field('house_active_ads');
	if($ads_is_active) { include(get_template_directory().'/template-parts/house/partials/ads.php'); }
	// Video
	$video_is_active = get_field('house_active_video');
	if($video_is_active) { include(get_template_directory().'/template-parts/house/partials/video.php'); }
	// Floor Plan
	$floor_plan_is_active = get_field('active_house_plan');
	if($floor_plan_is_active) { include(get_template_directory().'/template-parts/house/partials/house-plan.php'); }
	//360 View
	$virtual_link = $virtual_video['vt_url'];
	if($virtual_link) { include (get_template_directory().'/template-parts/house/partials/360-view.php'); }
	//Video Drone
	$drone_link = $virtual_video['vdo_url'];
	if($drone_link) { include (get_template_directory().'/template-parts/house/partials/video-drone.php'); }
	// Project Progress
	$progress_is_active = get_field('house_active_progress');
	if($progress_is_active) { include(get_template_directory().'/template-parts/house/partials/project-progress.php'); }
	// Custom Block
	$custom_block_is_active = get_field('condo_active_custom_block');
	if($custom_block_is_active) { include(get_template_directory().'/template-parts/condominium/partials/custom-block.php'); }
	// Contact
	$contact_is_active = get_field('house_active_contact');
	if($contact_is_active) { include(get_template_directory().'/template-parts/house/partials/contact.php'); }
?>