<?php
  $project_color = get_field('project_color');
  $main_color = $project_color['main_color'];

  $block_text_styles = get_field('block_text_and_styles', get_the_ID());
  $block_title = $block_text_styles['block_title'];
  $block_title_text_color = $block_text_styles['block_title_text_color'];
  $block_title_text_underline_color = $block_text_styles['block_title_text_underline_color'];
  $block_background_color = $block_text_styles['block_background_color'];
  $block_background_image = $block_text_styles['block_background_image'];
  $block_contents = get_field('block_contents', get_the_ID());

  if ($block_title_text_underline_color === '') {
    $block_title_text_underline_color = $main_color;
  }

  if ($block_title_text_color === '') {
    $block_title_text_color = $main_color;
  }
?>

<style>
  <?php if ($block_title_text_underline_color !== '') : ?>
  #custom_block-section .inner .section-title:before {
    border-color: <?php echo $block_title_text_underline_color; ?>;
  }
  <?php endif; ?>
  <?php if ($block_title_text_color !== '') : ?>
  #custom_block-section .inner .section-title {
    color: <?php echo $block_title_text_color; ?>;
  }
  <?php endif; ?>
  #custom_block-section .inner {
  <?php if ($block_background_color !== '' && $block_background_image !== '') : ?>
    background: <?php echo $block_background_color; ?> url("<?php echo $block_background_image; ?>") center no-repeat;
    background-size: cover;
  <?php elseif ($block_background_color !== '' && $block_background_image === '') : ?>
    background-color: <?php echo $block_background_color; ?>;
  <?php elseif ($block_background_color === '' && $block_background_image !== '') : ?>
    background-image: url("<?php echo $block_background_image; ?>") center no-repeat;
    background-size: cover;
  <?php endif; ?>
  }
</style>

<section id="custom_block-section">
	<div class="container">
		<div class="row">
      <div class="inner col-sm-12">
        <?php if($block_title) : ?>
        <h2 class="section-title text-center">
			    <?php echo $block_title; ?>
        </h2>
        <?php endif; ?>
        <div class="block_content">
          <?php echo $block_contents; ?>
        </div>
      </div>
		</div>
	</div>
</section>
