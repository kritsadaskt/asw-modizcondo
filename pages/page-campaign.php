<?php
/* Template name: Campaign */
get_header();
$p = get_the_ID();
$banners = get_field('cmp_hero_banner', $p);
$form_fields = get_field('form_fields', $p);
$page_colors = get_field('page_colors');
$main_color = $page_colors['main_color'];
$second_color = $page_colors['second_color'];
$cmpDetail = get_field('campaign_details', $p);
$dImg = $banners['desktop_img'];
$tImg = $banners['tablet_img'];
$mImg = $banners['mobile_img'];
$projects = get_field('project_list', $p);
$projects_listed = $projects['projects'];
$sms_email = get_field('sms_email', $p);
$is_send_sms = $sms_email['sms'];
if ($is_send_sms) {
  $sms_msg = $sms_email['sms_text'];
}
$raw_mail_list = $sms_email['mailing_list'];
$mail_list = '';
if (!empty($raw_mail_list)) {
	foreach ($raw_mail_list as $r) {
		if($mail_list === '') {
			$mail_list = $r['email'];
		} else {
			$mail_list = $mail_list . ',' . $r['email'];
		}
	}
}

$child = new WP_Query( array('post_parent' => $p, 'post_type' => 'page') );
$thank_you_img = get_field('d_image', $child->post->ID);

if (isset($_GET['utm_source']) === false) {
  $ref = 'direct_' . str_replace(' ', '_', get_the_title());
  $refId = 1;
} else {
  $ref = $_GET['utm_source'];
  $refId = 2;
}
if (isset($_GET['utm_medium']) === false) {
  $med = 'cpc';
  $refId = 1;
} else {
  $med = $_GET['utm_medium'];
  $refId = 2;
}
if (isset($_GET['utm_campaign']) === false) {
  $camp = 'UPZ_' . str_replace(' ', '_', get_the_title());
  $refId = 1;
} else {
  $camp = $_GET['utm_campaign'];
  $refId = 2;
}

$cmp_custom_html = get_field('cmp_custom_html', $p);

?>

<?php if(!empty($page_colors)) : ?>
<style>
  #campaign #form-cmp .inner .form-title {
    border-bottom-color: <?php echo $main_color; ?>;
  }
  #campaign #form-cmp .inner #campaign-register .checkbox span {
    color: <?php echo $main_color; ?>;
  }
  #campaign #project-listed .project-box .project-detail .detail-inner .location {
    border-bottom-color: <?php echo $second_color; ?>;
  }
  #campaign #form-cmp .inner .submit-btn,
  #campaign #project-listed .project-box .project-detail .detail-inner .button-group .btn-red {
    background-color: <?php echo $second_color; ?>;
  }
  #campaign #projects-listed-tab .tab-group .nav li.active a {
    border-bottom-color: <?php echo $main_color; ?>;
  }
  <?php if(!empty($cmpDetail['background'])) : ?>
  .cmp-bg {
    background: transparent url("<?php echo $cmpDetail['background']; ?>") right center repeat;
    background-size: cover;
  }
  <?php endif; ?>
  <?php if(!empty($projects['background_image'])) : ?>
  #project-listed {
    background: transparent url("<?php echo $projects['background_image']; ?>") center repeat;
  }
  <?php endif; ?>
</style>
<?php endif; ?>

<section id="hero-banner" class="text-center">
  <img src="<?php echo $dImg; ?>" class="hidden-xs <?php echo $tImg !== '' ? 'hidden-sm':''; ?>" alt="Hero Banner">
  <?php if($tImg != ''): ?>
  <img src="<?php echo $tImg; ?>" class="visible-sm" alt="Hero Banner">
  <?php endif; ?>
  <img src="<?php echo $mImg; ?>" class="visible-xs" alt="Hero Banner">
</section>

<div class="loading">
  <div class="lds-spinner">
    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>

<div id="campaign" class="container">
  <div class="cmp-bg row ">
    <?php
      $show_regbox = get_field('is_show_register_form', get_the_ID());
      if($show_regbox === null) {
        $show_regbox = true;
      }
    ?>
    <?php if($show_regbox) : ?>
    <div id="form-cmp" class="col-sm-6">
      <div class="inner">
        <h2 class="form-title text-center">
          <?php echo __('ลงทะเบียน', 'Projects template texts'); ?>
        </h2>
        <form id="campaign-register">
          <div class="row">
            <div class="name_col col-xs-6 col-sm-6">
              <label for="name" class="sr-only">Name</label>
              <input id="name" name="name" class="form-control" type="text" placeholder="<?php echo __('ชื่อ', 'Projects template texts'); ?>"
                  value="<?php echo $_GET['name']; ?>" required="">
            </div>
            <div class="name_col col-xs-6 col-sm-6">
              <label for="surname" class="sr-only">Surname</label>
              <input id="surname" name="surname" class="form-control" type="text" placeholder="<?php echo __('นามสกุล', 'Projects template texts'); ?>"
                  value="<?php echo $_GET['surname']; ?>" required="">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <label for="tel" class="sr-only">Telephone Number</label>
              <input id="tel" name="tel" class="form-control" type="tel" placeholder="<?php echo __('เบอร์โทรศัพท์', 'Projects template texts'); ?>"
                  value="<?php echo $_GET['tel']; ?>" minlength="10" required="">
            </div>
            <div class="col-sm-12">
              <label for="email" class="sr-only">Email</label>
              <input id="email" name="email" class="form-control" type="email" placeholder="<?php echo __('อีเมล', 'Projects template texts'); ?>"
                  value="<?php echo $_GET['email']; ?>" required="">
            </div>
	          <?php if ($sms_msg) : ?>
              <input id="smsText" type="hidden" value="<?php echo $sms_msg; ?>">
	          <?php endif; ?>
            <input type="hidden" id="mailingList" name="mailing-list" value="<?php echo $mail_list; ?>">
            <input id="ref" type="hidden" name="ref" value="<?php echo $ref; ?>">
            <input id="refId" type="hidden" name="refId" value="<?php echo $refId; ?>">
            <input type="hidden" id="thank_you_img" name="thank-you-img" value="<?php echo $thank_you_img; ?>">
            <input type="hidden" id="cmp_name" name="cmp-name" value="<?php the_title(); ?>">
            <?php if (!empty($form_fields)) : ?>
              <?php foreach ($form_fields as $field) : ?>
                <?php foreach ($field as $f) : ?>
                  <?php
                  $size = '';
                  if($f['size'] == 'half') {
                    $size = 'col-sm-6';
                  } else {
                    $size = 'col-sm-12';
                  }
                  ?>

                  <?php if ($f['type'] == 'Check box') : ?>
                    <div class="inpg <?php echo $size; ?>" data-type="checkbox">
                      <h3 class="field-title"><?php echo $f['label']; ?></h3>
                      <label class="db_label sr-only"><?php echo $f['db_label']; ?></label>
                      <?php foreach ($f['check_box_choices'] as $c) : ?>
                        <div class="check-box-item">
                          <div class="checkbox">
                            <label>
                              <?php
                              $cn = '';
                              $cc = '';
                              if(strpos($c['checkbox_name'], ' ')) {
                                $pcn = explode(' ', $c['checkbox_name']);
                                $cn = $pcn[0];
                                $cc = $pcn[1];
                              } else {
                                $cn = $c['checkbox_name'];
                              }
                              ?>
                              <input type="checkbox" value="<?php echo $cn; ?>" data-pname="<?php echo strip_tags($c['checkbox_label']); ?>" data-projectCode="<?php echo $cc; ?>">
                              <?php echo $c['checkbox_label']; ?>
                            </label>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php elseif ($f['type'] == 'Project Selector') : ?>
                    <div class="inpg projectSelector <?php echo $size; ?>" data-type="checkbox-project">
                      <h3 class="field-title"><?php echo $f['label']; ?></h3>
                      <label class="db_label sr-only"><?php echo $f['db_label']; ?></label>
                      <?php foreach ($f['project_selector_listed'] as $c) : ?>
                        <?php
                        $psid = $c['project'];
                        $project = get_field('project_information', $psid);
                        $dbname = str_replace('-', '_', get_post_field('post_name', $psid));
                        $code = $project['project_code'];
                        ?>
                        <div class="check-box-item">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="<?php echo $code; ?>" data-dbName="<?php echo $dbname; ?>"
                                  data-pname="<?php echo strip_tags($c['checkbox_label']); ?>"
                                  data-projectCode="<?php echo $code; ?>">
                              <?php echo $c['checkbox_label']; ?>
                            </label>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php elseif ($f['type'] == 'Dropdown') : ?>
                    <div class="inpg <?php echo $size; ?>" data-type="dropdown">
                      <h3 class="field-title"><?php echo $f['label']; ?></h3>
                      <label class="db_label sr-only"><?php echo $f['db_label']; ?></label>
                      <div class="dropdown">
                        <input id="<?php echo $f['name']; ?>" type="hidden" value="<?php echo $f['select_options'][0]['option_name']; ?>">
                        <button class="btn btn-default dropdown-toggle" type="button" id="<?php echo $f['name']; ?>-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <?php echo $f['select_options'][0]['option_label']; ?>
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="<?php echo $f['name']; ?>-dropdown">
                          <?php foreach ($f['select_options'] as $s) : ?>
                            <li>
                              <a href="#" title="<?php echo $s['option_name']; ?>" data-val="<?php echo $s['option_name']; ?>"><?php echo $s['option_label']; ?></a>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  <?php elseif ($f['type'] == 'Text box') : ?>
                    <div class="inpg <?php echo $size; ?>" data-type="text">
                      <h3 class="field-title"><?php echo $f['label']; ?></h3>
                      <label for="<?php echo $f['name']; ?>" class="db_label sr-only"><?php echo $f['db_label']; ?></label>
                      <textarea id="<?php echo $f['name']; ?>" class="form-control" rows="4"></textarea>
                    </div>
                  <?php endif; ?>

                <?php endforeach; ?>
              <?php endforeach; ?>
            <?php endif; ?>

            <div class="form-submit col-sm-12">
              <button type="submit" class="submit-btn" title="<?php echo __('ลงทะเบียน', 'Projects template texts'); ?>">
			          <?php echo __('ลงทะเบียน', 'Projects template texts'); ?>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php endif; ?>
    <div id="left-detail" class="<?php echo $show_regbox === true ? 'col-sm-6':'col-sm-12'; ?>">
      <div class="details">
        <?php
          echo $cmpDetail['content'];
        ?>
      </div>
    </div>
  </div>

  <?php
  $projects_tab_group = get_field('projects_group', get_the_ID());
  $show_projects_group = get_field('show_project_group', get_the_ID());
  $section_count = 1;
  ?>
  <?php if($show_projects_group) : ?>
  <section id="projects-listed-tab" class="row">
	  <?php foreach ($projects_tab_group as $rows) : ?>
      <div class="tab-group">
			  <?php $row = $rows['projects_tab_group']; ?>
        <ul class="nav nav-pills">
	        <?php $nav_count=1; ?>
            <?php foreach ($row as $r) : ?>
            <li role="presentation" class="<?php echo $nav_count === 1 ? 'active':''; ?>">
              <a href="#section-<?php echo $section_count; ?>-tab-<?php echo $nav_count; ?>"
                 id="section-<?php echo $section_count; ?>-nav-<?php echo $nav_count; ?>" data-toggle="tab">
                <?php echo $r['project_detail']['project_title']; ?>
              </a>
            </li>
            <?php $nav_count++; ?>
	        <?php endforeach; ?>
        </ul>
        <div class="tab-content">
	        <?php $tab_count=1; ?>
          <?php foreach ($row as $r) : ?>
            <?php $detail_text = $r['project_detail'] ?>
            <div role="tabpanel" class="tab-pane <?php echo $tab_count === 1 ? 'active':''; ?>"
                 id="section-<?php echo $section_count; ?>-tab-<?php echo $tab_count; ?>"
                 style="background-image: url('<?php echo $detail_text['bg']; ?>')">
              <div class="tab-content-box">
                <div class="tab-content-text"><?php echo $detail_text['project_details_text']; ?></div>
              </div>
            </div>
	          <?php $tab_count++; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <?php $section_count++; ?>
	  <?php endforeach; ?>
  </section>
  <?php endif; ?>

  <?php if(get_field('is_show_project_list', get_the_ID())) : ?>
  <div id="project-listed" class="row">
    <div class="col-sm-12">
      <div class="title-wrapper">
        <h2 class="project-list-title">
          <?php echo $projects['title']; ?>
        </h2>
      </div>
    </div>
    <?php foreach ($projects_listed as $p) : ?>
    <div class="project-box col-sm-12">
      <div class="row">
        <?php
          $p2 = $p['project'];
          $p_thumb = '';
          $p_img = $p['project_image'];
          if($p_img) {
            $p_thumb = $p_img;
          } else {
            $p_thumb = get_the_post_thumbnail_url($p2->ID);
          }
        ?>
        <div class="project-image col-sm-7 col-md-8"
            style="background: transparent url('<?php echo $p_thumb; ?>') center no-repeat; background-size: cover;">
        </div>
        <div class="project-detail col-sm-5 col-md-4">
          <?php $p_detail = $p['detail']; ?>
          <div class="detail-inner">
            <h3><?php echo $p_detail['title']; ?></h3>
            <h4 class="location"><?php echo $p_detail['location']; ?></h4>
            <p><?php echo $p_detail['pre_text']; ?></p>
            <h4 class="hilight"><?php echo $p_detail['hilight_text']; ?></h4>
            <span class="price"><?php echo $p_detail['price_text']; ?></span>
            <p class="button-group text-right">
              <a href="<?php echo get_permalink($p['project']->ID) . '?utm_source=' . $ref . '&utm_medium=' . $med . '&utm_campaign=' . $camp . '#contact-section'; ?>" target="_blank" class="btn btn-red" title="maps">MAPS</a>
              <a href="<?php echo get_permalink($p['project']->ID) . '?utm_source=' . $ref . '&utm_medium=' . $med . '&utm_campaign=' . $camp; ?>" target="_blank" class="btn btn-red" title="more">MORE</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <div id="custom-html" class="row"
      style="background-color: <?php echo $cmp_custom_html['background_color']?$cmp_custom_html['background_color']:''; ?>;
          background-image: url(<?php echo $cmp_custom_html['background_image']?$cmp_custom_html['background_image']:''; ?>)">
    <div class="col-sm-12">
      <?php echo $cmp_custom_html['custom_html']; ?>
    </div>
  </div>
</div>

<?php
get_sidebar();
get_footer();
