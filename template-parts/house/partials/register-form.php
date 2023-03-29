<?php
	/**
	 * Register Form partial
	 */
	$form_group = get_field('house_from_group');
	$position_form = $form_group['house_form_position'];
	$header_img_form = $form_group['house_form_header_image'];
	$header_img_form_mob = $form_group['house_form_header_image_mob'];
	$bg_color_form = fadeColor($form_group['house_form_bg_color'], 0.85);
	$bg_color_form_mob = $form_group['house_form_bg_color_mob'];
  $register_btn_color = $form_group['register_button_text_color'];
  $register__btn_bg_color = $form_group['register_btn_bg_color'];
	$tel_form = $form_group['house_form_tel'];
	$tel_d_theme = $form_group['tel_d_theme'];
	$tel_m_theme = $form_group['tel_m_theme'];
	$project_color = get_field('project_color');
	$main_color = $project_color['main_color'];
	$project_info = get_field('project_information');
	$sms_project_name = $project_info['project_name'] . ' ' . $project_info['project_location'];
	$sms_project_desc = $project_info['project_short_description'];
	$en_form = $form_group['is_english_form'];

	if($project_info['project_code']) {
		$project_code = $project_info['project_code'];
	} else {
		$project_code = 'N/A';
	}

  $project_name = $project_info['project_name'];

  if(stripos($project_name, 'wynn') !== false) {
    $projectSender = 'WynnCondo';
  } elseif (stripos($project_name, 'modiz') !== false) {
    $projectSender = 'ModizCondo';
  } elseif (stripos($project_name, 'brown') !== false) {
    $projectSender = 'BrownCondo';
  } elseif (stripos($project_name, 'episode') !== false) {
    $projectSender = 'EPISODE';
  } elseif (stripos($project_name, 'h2') !== false) {
    $projectSender = 'H2CONDO';
  } else {
    $projectSender = 'ASW';
  }

  $mailing_list = get_field('mailing_list_2');
  $mailing_listed = '';
  $c = 1;
  if(have_rows('mailing_list_2')) {
    while (have_rows('mailing_list_2')) {
      the_row();
      $email =  get_sub_field('email_address');
      if ($c == 1) {
        $mailing_listed = $email;
      } else {
        $mailing_listed =  $mailing_listed . "," . $email;
      }
      $c++;
    }
  } else {
    $mailing_listed = get_field('mailing_list');
  }

	$get_thank_page_args = array(
		'post_parent' => get_the_ID(),
    'post_type' => 'house'
  );

	$thankPageId = array_values(get_children($get_thank_page_args));
	$thankPage = '';
  foreach ($thankPageId as $item) {
    $thankPage = $item->ID;
  }

  $thanksImage = get_field('d_image', $thankPage);

	if (isset($_GET['utm_source']) === false) {
		$ref = 'Direct';
	} else {
		$ref = $_GET['utm_source'];
	}
	$p = get_the_ID();
	$slug_str = get_post_field( 'post_name', get_post() );
	$slug = str_replace('-','_',$slug_str);

	$project_name = $project_info['project_name'];

	?>

	<style>
		#register-box {
			background-color: <?php echo $bg_color_form; ?>;
		}
    .form-group #submit {
      background-color: <?php echo $register__btn_bg_color !== '' ? $register__btn_bg_color:$main_color; ?>;
      color: <?php echo $register_btn_color; ?>
    }
		@media(max-width: 480px) {
			#register-box {
				background-color: <?php echo $bg_color_form_mob; ?>;
			}
		}
	</style>

	<div id="register-box" class="<?php echo $position_form; ?>">
		<img class="register-box-promotion hidden-xs" src="<?php echo $header_img_form; ?>" alt="">
		<img class="register-box-promotion visible-xs" src="<?php echo $header_img_form_mob; ?>" alt="">
		<form id="reg-form" class="regis-form" method="POST">
			<div class="col-sm-12">
				<div class="name-row row">
					<div class="name_col col-xs-6 col-sm-6">
						<input id="name" name="name" class="form-control"
                   type="text" placeholder="<?php echo __('ชื่อ', 'Projects template texts'); ?>" value="<?php echo $_GET['name']; ?>" required="">
					</div>
					<div class="name_col col-xs-6 col-sm-6">
						<input id="surname" name="surname" class="form-control"
                   type="text" placeholder="<?php echo __('นามสกุล', 'Projects template texts'); ?>" value="<?php echo $_GET['surname']; ?>" required="">
					</div>
				</div>
				<div class="form-group">
					<input id="tel" name="tel" class="form-control" type="tel" placeholder="<?php echo __('เบอร์โทรศัพท์', 'Projects template texts'); ?>" value="<?php echo $_GET['tel']; ?>" minlength="10" required="">
				</div>
				<div class="form-group">
					<input id="email" name="email" class="form-control" type="email" placeholder="<?php echo __('อีเมล', 'Projects template texts'); ?>"
					       value="<?php echo $_GET['email']; ?>" required="">
				</div>
				<input type="hidden" id="ref" name="ref" value="<?php echo $ref; ?>">
				<input type="hidden" id="property" name="property" value="<?php echo $slug; ?>">
				<input type="hidden" id="propertyName" name="property-name" value="<?php the_title(); ?>">
				<input type="hidden" id="mailingList" name="mailing-list" value="<?php echo $mailing_listed; ?>">
        <input type="hidden" id="isSendSms" name="is-send-sms" value="<?php echo get_field('is_send_sms')?'yes':'no'; ?>">
        <input type="hidden" id="thanksImageLink" name="thank-you-image-link" value="<?php echo $thanksImage; ?>">
        <input type="hidden" id="project-code" name="project-code" value="<?php echo $project_code; ?>">
        <?php if(get_field('is_send_sms', $p)) :?>
          <input type="hidden" id="sms_text" name="sms_text" value="<?php echo get_field('sms_text', $p); ?>">
          <input type="hidden" id="sms_sender" name="sms_sender" value="<?php echo $projectSender; ?>">
        <?php endif; ?>
        <!--
        <div class="recaptchaWrapper">
          <div class="g-recaptcha" data-sitekey="6Le2SJUUAAAAAE0VmLRy-tLuYQ1EhE9oCcx4isDo"></div>
        </div>
        -->
				<div class="form-group">
					<button id="submit"><?php echo __('ลงทะเบียน', 'Projects template texts'); ?></button>
					<div class="telbox_wrapper text-center d-theme-<?php echo $tel_d_theme; ?> m-theme-<?php echo $tel_m_theme; ?>">
						<a href="tel:<?php echo $tel_form; ?>" class="telbox">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<?php echo $tel_form; ?>
						</a>
					</div>
				</div>
				</div>
		</form>
	</div>
