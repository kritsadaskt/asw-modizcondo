<?php
	/**
	 * Info Tabs partial
	 */
	//Section Styles
	$project_color = get_field('project_color');
	$main_color = $project_color['main_color'];
	if($project_color['secondary_color']) {
		$secondary_color = $project_color['secondary_color'];
  } else {
	  $section_main_color = $main_color;
  }

	$tab_position = get_field('tab_position');
	$section_styles = get_field('info_section_styles');
	$tab_bg_color = $section_styles['tab_background_color'];
	$tab_text_color = $section_styles['tab_text_color'];
	if($section_styles['section_main_color'] !== '') {
		$section_main_color = $section_styles['section_main_color'];
	} else {
		$section_main_color = $secondary_color;
	}
	if($section_styles['info_background_color'] !== '') {
		$info_bg_color = $section_styles['info_background_color'];
  } else {
	  $info_bg_color = $tab_bg_color;
  }
	// Elements
	$info_rows = get_field('house_info_repeater');
	if($info_rows) {
		foreach($info_rows as $row) {
			$desc_tab = $row['house_info_desc_tab'];
			$bg_img = $row['house_info_bg_tab'];
		}
	}
?>

<style>
	#info-section .inner, #info-section .inner .tab-bar {
		background-color: <?php echo $tab_bg_color; ?>;
	}
	#info-section .inner .tab-bar ul li a {
		color: <?php echo $tab_text_color; ?>;
	}
	#info-section .inner .tab-bar ul li.active a, #info-section .inner .tab-bar ul li a:hover {
		border-color: <?php echo $section_main_color ? $section_main_color : $main_color; ?>;
	}
  #info-section .inner .tab-content .info-box {
    background-color: <?php echo fadeColor($info_bg_color, 0.85); ?>;
  }
  #info-section .inner .tab-content .info-box strong,
  #info-section .inner .tab-content .info-box h1,
  #info-section .inner .tab-content .info-box h2,
  #info-section .inner .tab-content .info-box h3,
  #info-section .inner .tab-content .info-box h4
  {
    color: <?php echo $main_color; ?>;
  }
  <?php if($tab_position === 'right') : ?>
  #info-section .inner .tab-bar {
    text-align: right;
  }
  <?php endif; ?>
  @media (max-width: 480px) {
    #info-section .inner .tab-bar {
      text-align: center;
    }
  }
</style>

<section id="info-section">
	<div class="container">
		<div class="row">
			<div class="inner">
        <?php if(count($info_rows) > 1) : ?>
				<div class="tab-bar">
					<ul>
						<?php
							if($info_rows) {
								$index = 1;
								foreach ( $info_rows as $row ) {
									$title_tab = $row['house_info_title_tab'];
									if($index === 1) {
										echo "<li class='active'><a data-toggle='tab' href='#tab-" . $index . "'>" . $title_tab ."</a></li>";
									} else {
										echo "<li><a data-toggle='tab' href='#tab-" . $index . "'>" . $title_tab ."</a></li>";
									}
									$index++;
								}
							}
						?>
					</ul>
				</div>
        <?php endif; ?>
				<div class="tab-content">
					<?php
					if($info_rows) {
						$index = 1;
						foreach ( $info_rows as $row ) {
							$desc_tab = $row['house_info_desc_tab'];
							if($row['description_background_color'] !== '') {
							  $desc_bg_color = $row['description_background_color'];
              }
							$bg_img = $row['house_info_bg_tab'];
							$bg_img_mob = $row['house_info_bg_tab_mob'];
							if($index === 1) {
								echo "<div id='tab-" . $index . "' role='tabpanel' class='tab-pane fade active in' style='background-image: url(" . $bg_img . ")'>";
								if($desc_bg_color) {
									echo "<div class='info-box' style='background-color: " . fadeColor($desc_bg_color, '0.85') . ";'>" . $desc_tab . "</div>";
                } else if ($bg_img !== '' && $desc_tab === '') {
								  echo "<img class='hidden-xs' src='" . $bg_img ."' alt=''>";
								  echo "<img class='visible-xs' src='" . $bg_img_mob ."' alt=''>";
                } else {
									echo "<div class='info-box'>" . $desc_tab . "</div>";
                }
								echo "</div>";
							} else {
								echo "<div id='tab-" . $index . "' role='tabpanel' class='tab-pane fade' style='background-image: url(" . $bg_img . ")'>";
								if($desc_bg_color) {
									echo "<div class='info-box' style='background-color: " . fadeColor($desc_bg_color, '0.85') . ";'>" . $desc_tab . "</div>";
								} else if ($desc_bg_color !== '' && $desc_tab === '') {
									echo "<img class='hidden-xs' src='" . $bg_img ."' alt=''>";
									echo "<img class='visible-xs' src='" . $bg_img_mob ."' alt=''>";
								} else {
									echo "<div class='info-box'>" . $desc_tab . "</div>";
								}
								echo "</div>";
							}
							$index++;
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>