<?php
/**
* Hero Banner partial
*/
// Elements
$p =get_the_ID();
$bg_image_desktop = get_field('condo_hb_desktop');
$bg_image_tablet = get_field('condo_hb_tablet');
$bg_image_mobile = get_field('condo_hb_mobile');
$form_is_active = get_field('condo_form_active');
$sold_out_is_active = get_field('active_sold_out_banner');
if(get_field('hero_banner_external_link', get_the_ID()) !== '') {
  $hero_link = get_field('hero_banner_external_link', get_the_ID());
}
?>
<div id="loader">
  <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<section id="hero-banner">
  <?php if($hero_link) : ?>
  <a href="<?php echo $hero_link; ?>" title="" target="_blank">
  <?php endif; ?>
    <img class="d_hero_bg hidden-xs hidden-sm"
         src="<?php echo $bg_image_desktop; ?>" alt="">
  <?php if($bg_image_tablet) : ?>
    <img class="t_hero_bg hidden-xs visible-sm hidden-md"
         src="<?php echo $bg_image_tablet; ?>" alt="">
  <?php else : ?>
    <img class="t_hero_bg hidden-xs visible-sm hidden-md"
         src="<?php echo $bg_image_desktop; ?>" alt="">
  <?php endif; ?>
    <img class="m_hero_bg visible-xs hidden-sm"
         src="<?php echo $bg_image_mobile; ?>" alt="">
  <?php if($hero_link) : ?>
  </a>
  <?php endif; ?>
  <?php
    if($form_is_active) {
      include( get_template_directory() . '/template-parts/condominium/partials/register-form.php' );
    } else if (!$form_is_active && $sold_out_is_active) {
      include( get_template_directory() . '/template-parts/condominium/partials/sold-out-banner.php' );
    }
  ?>
</section>