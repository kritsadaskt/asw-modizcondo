<?php
	/**
	 * Floor Plan partial
	 */
	// Elements
	$heading_title = get_field('condo_floor_plan_heading_title');
	//Styles
	$project_color = get_field('project_color');
	$main_color = $project_color['main_color'];
	$secondary_color = $project_color['secondary_color'];

	if($secondary_color) {
	  $tabs_color = $secondary_color;
  } else {
	  $tabs_color = $main_color;
  }

	$header_styles = get_field('floor_unit_plan_header_styles');
	$header_color = $header_styles['text_color'];
	$header_underline_color = $header_styles['text_underline_color'];

	$section_styles = get_field('unit_floor_plan_section_styles');
	$bg_color = $section_styles['background_color'];
	$bg_img = $section_styles['background_image'];

	if($header_styles['text_underline_color'] !== '') {
		$header_underline_color = $header_styles['text_underline_color'];
	} else {
		$header_underline_color = $main_color;
	}

	// Floor Plan
	$floor_plan_is_active = get_field('condo_active_floor_plan_info');
	$floor_plan_title = get_field('condo_floor_plan_title');
	$floor_plan_rows = get_field('condo_floor_plan_repeater');
	$is_floor_group = get_field('condo_group_floor_plan');

	// Unit Plan
	$unit_plan_is_active = get_field('condo_active_unit_plan_info');
	$unit_plan_title = get_field('condo_unit_plan_title');
	$is_unit_group = get_field('condo_group_unit_plan');
	?>

	<style>
		<?php if($bg_color) : //BG Color was set?>
		#section-floor-plan .inner {
			background-color: <?php echo $bg_color; ?>
		}
		<?php endif; ?>
		<?php if($bg_img) : //BG Image was set?>
		#section-floor-plan .inner {
			background-image: url('<?php echo $bg_img; ?>');
		}
		<?php endif; ?>
		<?php if($bg_color !== '' && $bg_img !== '') : //BG Color and Image was set?>
		#section-floor-plan .inner {
			background: <?php echo $bg_color; ?> url('<?php echo $bg_img; ?>') no-repeat center;
			background-size: cover;
		}
		<?php endif; ?>
		#section-floor-plan .inner .section-title {
			color: <?php echo $header_color; ?>;
		}
		#section-floor-plan .inner .section-title:before, #section-floor-plan .inner .plan-content select {
			border-color: <?php echo $header_underline_color; ?>;
		}
    #section-floor-plan .inner .plan-choose ul li.active a {
      background-color: <?php echo $tabs_color; ?>;
      border-color: <?php echo $tabs_color; ?>;
    }
    #section-floor-plan .inner .plan-choose ul li a {
      border-color: <?php echo fadeColor($tabs_color, 0.7) ?>;
    }
	</style>

	<section id="section-floor-plan">
		<div class="container">
			<div class="row">
				<div class="inner">
					<h2 class="section-title text-center">
						<?php echo $heading_title; ?>
					</h2>
					<div class="plan-choose" id="plan-unit-choice">
						<ul>
							<?php if($floor_plan_is_active) : ?>
							<li style="left:5px;" class="active">
								<a href="#plan-tab" data-toggle="tab"><?php echo $floor_plan_title; ?></a></li>
							<?php endif; ?>
							<?php if($unit_plan_is_active) : ?>
							<li style="left:-5px;">
								<a href="#unit-tab" data-toggle="tab"><?php echo $unit_plan_title; ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="tab-content plan-content">
						<?php if($floor_plan_is_active) : ?>
						<div role="tabpanel" class="tab-pane fade in active" id="plan-tab">
              <label for="floor-selector" type="hidden"></label>
              <select id="floor-selector" class="fl-select">
								<?php
								if(!$is_floor_group) {
									$floor_plan_rows = get_field('condo_floor_plan_non_group_repeater');
									if($floor_plan_rows) {
										foreach($floor_plan_rows as $row) {
											$floor_plan_name = $row['condo_upngr_floor_plan_name'];
											$floor_plan_image = $row['condo_upngr_floor_plan_image'];
											echo "<option value='" . $floor_plan_image . "'>" . $floor_plan_name . "</option>";
										}
									}
								} else {
									$floor_plan_rows = get_field('condo_floor_plan_group_repeater');
									if($floor_plan_rows) {
										foreach($floor_plan_rows as $row) {
											$group_name = $row['condo_fgr_group_text'];
											$group_info = $row['condo_fgr_group_text_repeater'];
											echo "<optgroup label='" . $group_name . "'>";
											if($group_info) {
												foreach($group_info as $group_row) {
													$floor_plan_name = $group_row['condo_fgr_floor_name'];
													$floor_plan_image = $group_row['condo_fgr_floor_image'];
													echo "<option value='" . $floor_plan_image . "'>" . $floor_plan_name . "</option>";
												}
											}
											echo "</optgroup>";
										}
									}
								}
								?>
              </select>
              <div class="plan-image">
								<?php if(!$is_floor_group) : ?>
									<?php $f_floor_img = $floor_plan_rows[0]['condo_upngr_floor_plan_image']; ?>
                  <img id="plan-image-show" src="<?php echo $f_floor_img; ?>" alt="">
								<?php else : ?>
                  <?php
                    $f_floor = $floor_plan_rows[0];
                    $f_floor_img = $f_floor['condo_fgr_group_text_repeater'][0]['condo_fgr_floor_image'];
                  ?>
                  <img id="plan-image-show" src="<?php echo $f_floor_img; ?>" alt="">
								<?php endif; ?>
              </div>
						</div>
						<?php endif; ?>
						<?php if($unit_plan_is_active) : ?>
						<div role="tabpanel" class="tab-pane fade" id="unit-tab">
							<label for="unit-selector" type="hidden"></label>
							<select id="unit-selector" class="fl-select">
								<?php
								if(!$is_unit_group) {
									$unit_plan_rows = get_field('condo_unit_plan_non_group_repeater');
									if($unit_plan_rows) {
										foreach($unit_plan_rows as $row) {
											$unit_plan_name = $row['condo_upngr_unit_plan_name'];
											$unit_plan_image = $row['condo_upngr_unit_plan_image'];
											echo "<option value='" . $unit_plan_image . "'>" . $unit_plan_name . "</option>";
										}
									}
								} else {
									$unit_plan_rows = get_field('condo_unit_plan_group_repeater');
									if($unit_plan_rows) {
										foreach($unit_plan_rows as $row) {
											$group_name = $row['condo_upgr_group_text'];
											$group_info = $row['condo_upgr_group_text_repeater'];
											echo "<optgroup label='" . $group_name . "'>";
											if($group_info) {
												foreach($group_info as $group_row) {
													$unit_plan_name = $group_row['condo_upgr_unit_name'];
													$unit_plan_image = $group_row['condo_upgr_unit_image'];
													echo "<option value='" . $unit_plan_image . "'>" . $unit_plan_name . "</option>";
												}
											}
											echo "</optgroup>";
										}
									}
								}
								?>
							</select>
							<div class="plan-image">
								<?php if(!$is_unit_group) : ?>
									<img id="unit-image-show" src="<?php echo $unit_plan_rows[0]['condo_upngr_unit_plan_image']; ?>" alt="">
								<?php else : ?>
								<?php
									$f_unit = $unit_plan_rows[0];
									$f_unit_img = $f_unit['condo_upgr_group_text_repeater'][0]['condo_upgr_unit_image'];
								?>
									<img id="unit-image-show" src="<?php echo $f_unit_img; ?>" alt="">
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
          <?php if(get_the_ID() === 2532) : ?>
          <!--
          <div class="download-factsheet">
            <div class="container">
              <a class="btn factsheet-btn" href="https://bit.ly/2Vpt19y" target="_blank" title="Download E-Factsheet Kave Town Space">
                Download E-Factsheet Kave Town Space
              </a>
              <a class="btn factsheet-btn" href="https://bit.ly/2Eyth0m" target="_blank" title="Download E-Factsheet Kave Town Shift">
                Download E-Factsheet Kave Town Shift
              </a>
            </div>
          </div>
          -->
          <?php endif; ?>
				</div>
			</div>
		</div>
	</section>
