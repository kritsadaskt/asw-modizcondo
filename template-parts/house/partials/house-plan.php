<?php
	/**
	 * Floor Plan partial
	 */

  //Styles
  $project_color = get_field('project_color');
  $main_color = $project_color['main_color'];
  $secondary_color = $project_color['secondary_color'];

	$plans_row = get_field('house_plans');

  $header_styles = get_field('houseplan_header_styles');
  $heading_title = $header_styles['house_plan_title'];
  $header_text_color = $header_styles['title_color'];
  if($header_styles['title_underline_color'] !== '') {
    $header_text_underline_color = $header_styles['title_underline_color'];
  } else {
    $header_text_underline_color = $main_color;
  }

  $section_styles = get_field('houseplan_section_styles');
  $section_bg_color = $section_styles['background_color'];
  $section_bg_image = $section_styles['background_image'];

	?>

	<style>
    <?php if($section_bg_color != '') : ?>
    #section-floor-plan .inner {
      background-color: <?php echo $section_bg_color; ?>;
    }
    <?php endif; ?>
    #section-floor-plan .inner .section-title::before {
      border-color: <?php echo $header_text_underline_color; ?>;
    }
	</style>

	<section id="section-floor-plan">
		<div class="container">
			<div class="row">
				<div class="inner">
					<h2 class="section-title text-center">
						<?php echo $heading_title; ?>
					</h2>
					<div class="house-plan">
            <label for="house-plan-selector" type="hidden"></label>
            <div class="house-plan-selector">
              <select id="house-plan-selector">
		            <?php foreach ($plans_row as $plan) : ?>
                  <option value="<?php echo $plan['plan_image']; ?>"><?php echo $plan['plan_name']; ?></option>
		            <?php endforeach; ?>
              </select>
            </div>
            <div class="plan-image">
              <img id="plan-image-area" src="<?php echo $plans_row[0]['plan_image']; ?>" alt="<?php echo $plans_row[0]['plan_name']; ?>">
            </div>
          </div>
				</div>
			</div>
		</div>
	</section>
