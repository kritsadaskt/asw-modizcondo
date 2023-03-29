<?php
  /**
  * Hero Banner partial
  */
	// Elements
  $p = get_the_ID();
  $bg_image_desktop = get_field('house_hb_desktop', $p);
  $bg_image_tablet = get_field('house_hb_tablet', $p);
  $bg_image_mobile = get_field('house_hb_mobile', $p);
  $form_is_active = get_field('house_form_active', $p);
  $sold_out_is_active = get_field('active_sold_out_banner', $p);
?>

  <div class="loading">
    <div class="lds-spinner">
      <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
  </div>

	<section id="hero-banner">
		<img class="d_hero_bg hidden-xs hidden-sm" src="<?php echo $bg_image_desktop; ?>" alt="">
		<img class="t_hero_bg hidden-xs visible-sm hidden-md" src="<?php echo $bg_image_tablet; ?>" alt="">
		<img class="m_hero_bg visible-xs" src="<?php echo $bg_image_mobile; ?>" alt="">
		<?php
      if($form_is_active) {
        include( get_template_directory() . '/template-parts/house/partials/register-form.php' );
      } else if (!$form_is_active && $sold_out_is_active) {
	      include( get_template_directory() . '/template-parts/house/partials/sold-out-banner.php' );
      }
		?>
	</section>