<?php
	/**
	 * Video partial
	 */
	$project_color = get_field('project_color');
	$main_color = $project_color['main_color'];

	//Section Header
	$section_header = get_field('video_section_header');
	$video_section_title = $section_header['title'];
	$video_section_title_color = $section_header['title_color'];
	if($section_header['title_underline_color'] !== '') {
		$video_section_title_underline_color = $section_header['title_underline_color'];
	} else {
		$video_section_title_underline_color = $main_color;
	}

	//Section Styles
	$section_styles = get_field('video_section_styles');
	$section_bg_color = $section_styles['background_color'];
	$section_bg_img = $section_styles['background_image'];

	// Elements
	$video_title = get_field('condo_video_title');
	$video_url = get_field('condo_video_url'); ?>

	<style>
    <?php if($section_bg_img) : ?>
    #project-videos .inner {
      background-image: url('<?php echo $section_bg_img; ?>');
    }
    <?php elseif ($section_bg_color) : ?>
    #project-videos .inner {
      background-color: <?php echo $section_bg_color; ?>;
    }
    <?php endif; ?>
		#project-videos .inner .section-title {
			color: <?php echo $video_section_title_color; ?>;
		}
		#project-videos .inner .section-title:before {
			border-color: <?php echo $video_section_title_underline_color; ?>;
		}
		#project-videos .inner .video-wrapper {
			border-color: <?php echo $main_color; ?>
		}
	</style>

	<section id="project-videos">
		<div class="container">
			<div class="row">
				<div class="inner">
					<h2 class="section-title text-center">
						<?php echo $video_section_title; ?>
					</h2>
					<div class="video-wrapper <?php echo count(get_field('videos')) > 1 ? 'video-slide':'' ?>">
						<?php if(have_rows('videos')) : ?>
							<?php while( have_rows('videos') ): the_row();
								$url = get_sub_field('video_link');?>
                <div class="video-item">
                  <iframe class="youtube-video"
                          src="<?php echo $url; ?>?rel=0&amp;controls=0&amp;showinfo=0"
                          frameborder="0" allowfullscreen width="100%" height="100%"></iframe>
                </div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
