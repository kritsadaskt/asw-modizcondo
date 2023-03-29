<?php
	/**
	 * Gallery partial
	 */
	// Colors
	$bg_color = get_field('block_bg_color');

	$project_color = get_field('project_color');
	$main_color = $project_color['main_color'];
	if($project_color['secondary_color'] !== '') {
	  $secondary_color = $project_color['secondary_color'];
  }

	// Elements
	$gallery_section_title = get_field('gallery_section_title');
	$gallery_section_title_color = get_field('gallery_section_title_color');
	if(get_field('gallery_section_title_underline_color') !== '') {
		$gallery_section_title_underline_color = get_field('gallery_section_title_underline_color');
	} else {
		$gallery_section_title_underline_color = $main_color;
	}
	$main_is_active = get_field('condo_active_main_gallery');
	$unit_is_active = get_field('condo_active_unit_gallery');
	$gallery_3_is_active = get_field('condo_active_gallery_3');
	// Main Gallery
  if($main_is_active) {
	  $main_info           = get_field( 'condo_main_gallery_group' );
	  $main_gallery_title  = $main_info['condo_main_gallery_title'];
	  $main_gallery_images = $main_info['condo_main_gallery_images'];
  }
	// Unit Gallery
  if($unit_is_active) {
	  $unit_info           = get_field( 'condo_unit_gallery_group' );
	  $unit_gallery_title  = $unit_info['condo_unit_gallery_title'];
	  $unit_gallery_images = $unit_info['condo_unit_gallery_images'];
  }
  // Gallery 3
  $gallery_3 = get_field('condo_gallery_3_group');
  if($gallery_3 !== '') {
	  $gallery_3_title = $gallery_3['condo_gallery_3_title_text'];
	  $gallery_3_images = $gallery_3['condo_gallery_3_images'];
  }
  ?>

	<style>
		#project-gallery .inner {
			background-color: <?php echo $bg_color; ?>;
		}
		#project-gallery .inner .section-title, #project-gallery .inner .gallery-tab-bar ul li a {
			color: <?php echo $gallery_section_title_color; ?>;
		}
		#project-gallery .inner .section-title:before {
			border-color: <?php echo $gallery_section_title_underline_color; ?>;
		}
		#project-gallery .inner .flexslider .slides li.flex-active-slide,
    #project-gallery .inner .gallery-tab-bar ul li.active a{
			border-color: <?php echo $gallery_section_title_underline_color; ?> !important;
		}
	</style>

	<section id="project-gallery">
		<div class="container">
			<div class="row">
				<div class="inner">
					<?php if($gallery_section_title !== '') : ?>
					<h2 class="section-title text-center">
						<?php echo $gallery_section_title; ?>
					</h2>
          <?php endif; ?>
          <?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
          <div class="gallery-tab-bar">
            <ul>
	            <?php if($main_is_active) : ?>
                <li class="active"><a href="#main-gallery-wrapper" data-toggle="tab"><?php echo $main_gallery_title; ?></a></li>
              <?php endif; ?>
	            <?php if($unit_is_active) : ?>
                <li><a href="#unit-gallery-wrapper" data-toggle="tab"><?php echo $unit_gallery_title; ?></a></li>
              <?php endif; ?>
	            <?php if($gallery_3_is_active) : ?>
                <li><a href="#additional-gallery-wrapper" data-toggle="tab"><?php echo $gallery_3_title; ?></a></li>
	            <?php endif; ?>
            </ul>
          </div>
          <?php endif; ?>
					<?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
          <div class="tab-content">
          <?php endif; ?>

          <!-- Main Gallery -->
					<?php if($main_is_active) : ?>
            <?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
            <div class="tab-pane fade active in" role="tab" id="main-gallery-wrapper">
            <?php endif; ?>
						<?php if (!empty($main_gallery_images)) : ?>
              <div id="main-gallery-slider" class="flexslider">
                <ul class="slides">
                    <?php foreach( $main_gallery_images as $image ): ?>
                      <li class="gallery-item">
                        <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')">
                          <span class="gallery-overlay">
                            <?php if(ICL_LANGUAGE_CODE=='th'): ?>
                              <?php echo $image['caption'] === '' ? 'ภาพและบรรยากาศจำลอง' : $image['caption']; ?>
                            <?php elseif (ICL_LANGUAGE_CODE=='en') : ?>
                              <?php echo $image['caption'] === '' ? 'Computer generated image' : $image['caption']; ?>
                            <?php else : ?>
	                            <?php echo $image['caption'] === '' ? '计算机生成图像' : $image['caption']; ?>
                            <?php endif; ?>
                          </span>
                        </div>
                      </li>
                    <?php endforeach; ?>
                </ul>
              </div>
              <div id="main-gallery-carousel" class="flexslider">
                <ul class="slides">
                  <?php foreach( $main_gallery_images as $image ): ?>
                    <li class="gallery-item">
                      <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')"></div>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
						<?php else : ?>
              <p class="text-center">No Images</p>
						<?php endif; ?>
            <?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
            </div>
            <?php endif; ?>
          <?php endif; ?>

          <!-- Unit Gallery -->
					<?php if($unit_is_active) : ?>
            <?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
            <div class="tab-pane fade" role="tab" id="unit-gallery-wrapper">
            <?php endif; ?>
            <div id="unit-gallery-slider" class="flexslider">
              <ul class="slides">
                <?php foreach( $unit_gallery_images as $image ): ?>
                  <li class="gallery-item">
                    <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')">
                      <span class="gallery-overlay">
                        <?php if(ICL_LANGUAGE_CODE=='th'): ?>
                          <?php echo $image['caption'] === '' ? 'ภาพและบรรยากาศจำลอง' : $image['caption']; ?>
                        <?php elseif (ICL_LANGUAGE_CODE=='en') : ?>
                          <?php echo $image['caption'] === '' ? 'Computer generated image' : $image['caption']; ?>
                        <?php else : ?>
	                        <?php echo $image['caption'] === '' ? '计算机生成图像' : $image['caption']; ?>
                        <?php endif; ?>
                      </span>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div id="unit-gallery-carousel" class="flexslider">
              <ul class="slides">
                <?php foreach( $unit_gallery_images as $image ): ?>
                  <li class="gallery-item">
                    <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')"></div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
            </div>
            <?php endif; ?>
          <?php endif; ?>

          <!-- Additional Gallery -->
          <?php if($gallery_3_is_active && $gallery_3_images !== '') : ?>
            <?php if($main_is_active || $unit_is_active && $gallery_3_is_active) : ?>
              <div class="tab-pane fade" role="tab" id="additional-gallery-wrapper">
            <?php endif; ?>
            <div id="addition-gallery-slider" class="flexslider">
              <ul class="slides">
                <?php foreach( $gallery_3_images as $image ): ?>
                  <li class="gallery-item">
                    <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')">
                      <span class="gallery-overlay">
                        <?php if(ICL_LANGUAGE_CODE=='th'): ?>
	                        <?php echo $image['caption'] === '' ? 'ภาพและบรรยากาศจำลอง' : $image['caption']; ?>
                        <?php elseif (ICL_LANGUAGE_CODE=='en') : ?>
	                        <?php echo $image['caption'] === '' ? 'Computer generated image' : $image['caption']; ?>
                        <?php else : ?>
	                        <?php echo $image['caption'] === '' ? '计算机生成图像' : $image['caption']; ?>
                        <?php endif; ?>
                      </span>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div id="addition-gallery-carousel" class="flexslider">
              <ul class="slides">
                <?php foreach( $gallery_3_images as $image ): ?>
                  <li class="gallery-item">
                    <div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')"></div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php if($main_is_active || $unit_is_active && $gallery_3_is_active) : ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <?php if($main_is_active && $unit_is_active || $gallery_3_is_active) : ?>
          </div>
          <?php endif; ?>
				</div>
			</div>
		</div>
	</section>
