<?php
	/**
	 * Ads partial
	 */

	// Elements
	$ads_html = get_field('condo_ads_html');
	$bg_img = get_field('condo_ads_bg_img');
	$bg_img_mob = get_field('condo_ads_bg_img_mob');
	$bg_color = get_field('ads_background_color'); ?>

  <style>
	<?php if($bg_img !== '' && $bg_color !== '') : ?>
    #advantage-section .inner {
      background: <?php echo $bg_color; ?> url('<?php echo $bg_img; ?>') no-repeat center;
      background-size: cover;
    }
	<?php elseif($bg_img !== '' && $bg_color === '') : ?>
    #advantage-section .inner {
      background: transparent url('<?php echo $bg_img; ?>') no-repeat center;
      background-size: cover;
    }
	<?php elseif($bg_img === '' && $bg_color !== '') : ?>
    #advantage-section .inner {
      background-color: <?php echo $bg_color; ?>;
    }
	<?php endif; ?>
  <?php if($ads_html === '' && $bg_img !== '' && $bg_img_mob !== '') : ?>
    #advantage-section .inner {
      padding: 0;
    }
  <?php endif; ?>
  </style>

	<section id="advantage-section">
		<div class="container">
			<div class="row">
        <?php if($ads_html !== '') : ?>
				<div class="inner">
					<div class="advantage-wrapper">
						<?php echo $ads_html; ?>
					</div>
				</div>
        <?php else : ?>
        <div class="inner">
          <img class="hidden-xs" src="<?php echo $bg_img; ?>" alt="">
          <img class="visible-xs" src="<?php echo $bg_img_mob; ?>" alt="">
        </div>
        <?php endif; ?>
			</div>
		</div>
	</section>
