<?php
/**
 * Project Progress partial
 */
//Section Styles
$project_color = get_field('project_color', get_the_ID());
$main_color = $project_color['main_color'];

$header_styles = get_field('progress_header_styles', get_the_ID());
$header_color = $header_styles['title_color'];

$section_styles = get_field('progress_section_styles', get_the_ID());
$bg_color = $section_styles['background_color'];
$bg_img = $section_styles['background_image'];

if($header_styles['title_underline_color'] !== '') {
	$header_underline_color = $header_styles['title_underline_color'];
} else {
	$header_underline_color = $main_color;
}

if($section_styles['progress_color']) {
	$progress_color = $section_styles['progress_color'];
} else {
	$progress_color = $main_color;
}

// Elements
$progress_title = get_field('condo_progress_title');
$total_percent = get_field('condo_progress_total_percentage');
$month_progress = get_field('condo_progress_text');
$desc_rows = get_field('condo_progress_description_repeater');
$progress_gallery = get_field('condo_progress_gallery');
?>

<style>
	<?php if($bg_color) : //BG Color was set?>
	#progress-section .inner {
		background-color: <?php echo $bg_color; ?>
	}
	<?php endif; ?>
	<?php if($bg_img !== '') : //BG Image was set?>
	#progress-section .inner {
		background-image: url('<?php echo $bg_img; ?>');
	}
	<?php endif; ?>
	<?php if($bg_color && $bg_img !== '') : //BG Color and Image was set?>
	#progress-section .inner {
		background: <?php echo $bg_color; ?> url('<?php echo $bg_img; ?>') no-repeat center;
		background-size: cover;
	}
	<?php endif; ?>
  <?php if($header_color) : ?>
  h2.section-title {
    color: <?php echo $header_color; ?>;
  }
  <?php endif; ?>
	#progress-section .inner .section-title:before {
		border-color: <?php echo $header_underline_color; ?>;
	}
	.gallery-border-line, .progress-bar-inner {
		background-color: <?php echo $progress_color; ?>;
	}
	.value-bar {
		border-color: <?php echo $progress_color; ?>;
	}
	.progress-circle span {
		color: <?php echo $progress_color; ?>;
	}
  .progress-circle.over50 .first50-bar {
    background-color: <?php echo $progress_color; ?>;
  }
</style>

<section id="progress-section">
	<div class="container">
		<div class="row">
			<div class="inner">
				<h2 class="section-title text-center">
					<?php echo $progress_title; ?>
				</h2>
				<div class="progress-wrapper">
					<div class="gallery-progress">
						<div class="col-lg-7 col-md-7 col-sm-7 gallery-image f-right">
							<div class="gallery-image-show">
								<div class="gallery-main-thumb"
								     style="background-image: url('<?php echo $progress_gallery[0]['url'] ?>')"></div>
							</div>
							<div class="gallery-image-small-wrapper">
								<?php
									foreach ($progress_gallery as $progress_gallery_item) {
										echo "<div class='gallery-image-small'>";
										echo "<img src='" . $progress_gallery_item['url'] . "' class='img-responsive image-small-1'/>";
										echo "</div>";
									}
								?>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 gallery-content f-right">
							<div class="col-xs-12 text-center">
								<div class="progress-circle
									<?php echo ($total_percent > 50 ? 'over50':''); ?> p<?php echo round($total_percent); ?>" style="display:inline-block">
									<span><?php echo $total_percent; ?>%</span>
									<div class="left-half-clipper">
										<div class="first50-bar"></div>
										<div class="value-bar"></div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 nopadding text-center">
								<h5 class="month"><?php echo __('ความคืบหน้าเดือน', 'Projects template texts'); ?> <?php echo $month_progress; ?></h5>
							</div>
							<?php
							if($desc_rows) {
								foreach($desc_rows as $row) {
									$desc_title = $row['condo_progress_description_title'];
									$desc_percent = $row['condo_progress_description_percent'];
									echo "<div class='col-xs-12 progress-item'>";
									echo $desc_title . "<span class='progress-percent'>" . $desc_percent . "%</span>";
									echo "<div class='progress-bar-percent'><div class='progress-bar-inner' style='width:" . $desc_percent . "%'></div></div><div class='gallery-border-line'></div></div>";
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

