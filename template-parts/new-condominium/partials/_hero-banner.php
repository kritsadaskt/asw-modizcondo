<?php
$hero_banner = get_field('hero_banner', get_the_ID());
$top_menu = get_field('top_menu', get_the_ID());
?>

<?php if ($hero_banner) : ?>
<section id="hero_banner">
  <?php if (count($hero_banner) > 1) : ?>
  <div id="hero_slider_d" class="hidden-xs">
  <?php endif; ?>
    <?php foreach ($hero_banner as $banner) : ?>
      <img src="<?=$banner['d_img'];?>" alt="" class="hidden-xs">
    <?php endforeach; ?>
  <?php if (count($hero_banner) > 1) : ?>
  </div>
  <?php endif; ?>

  <?php if (count($hero_banner) > 1) : ?>
  <div id="hero_slider_m" class="visible-xs">
    <?php endif; ?>
    <?php foreach ($hero_banner as $banner) : ?>
      <img src="<?=$banner['m_img'];?>" alt="" class="visible-xs">
    <?php endforeach; ?>
    <?php if (count($hero_banner) > 1) : ?>
  </div>
<?php endif; ?>
</section>
<?php endif; ?>