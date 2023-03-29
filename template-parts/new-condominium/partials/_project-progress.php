<?php $project_progress = get_field('progress', get_the_ID());
$page_ident = get_field('page_identities', get_the_ID()); ?>

<style type="text/css">
    #project_progress .progress-wrapper,
    #project_progress #progress_listed .progress-item .progress-bar-percent .progress-bar-inner,
    #project_progress #progress_listed .overall-circle .progress-circle .first50-bar,
    #project_progress #progress_listed .overall-circle .progress-circle .value-bar{
        background-color: <?=$page_ident['main_color'];?>;
    }
    #project_progress #progress_listed .progress-item .progress-bar-percent,
    #project_progress #progress_listed .overall-circle .progress-circle .value-bar {
        border-color: <?=$page_ident['main_color'];?>;
    }
</style>

<section id="project_progress">
  <div class="header">
    <div class="container">
      <div class="row progress-title-row">
        <div class="col-sm-12">
          <h2 class="section-title">
          <span class="title"><?=$project_progress['title'];?></span>
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="progress-wrapper">
    <div class="container">
      <div class="row">
        <div id="progress_gallery" class="col-sm-6">
          <div class="progress-gallery-top">
            <?php foreach ($project_progress['progress_gallery'] as $img) : ?>
              <div class="slide" style="background-image:url(<?=$img['url'];?>)"></div>
            <?php endforeach; ?>
          </div>
          <div class="gallery-thumbs-wrapper">
            <div class="row">
              <div class="col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3">
                <div class="progress-gallery-thumbs">
                  <?php foreach ($project_progress['progress_gallery'] as $img) : ?>
                    <div class="slide" style="background-image:url(<?=$img['url'];?>)"></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="progress_listed" class="col-sm-6">
          <?php $progress_listed = $project_progress['progress']; ?>
          <div class="overall-circle">
            <div class="progress-circle <?php echo ($progress_listed['overall'] > 50 ? 'over50':''); ?> p<?php echo round($progress_listed['overall']); ?>" style="display:inline-block">
              <span><?php echo $progress_listed['overall']; ?>%</span>
              <div class="left-half-clipper">
                <div class="first50-bar"></div>
                <div class="value-bar"></div>
              </div>
            </div>
          </div>
          <h5 class="month"><?php _e('ความคืบหน้าเดือน', 'Theme texts'); ?> <?php echo $progress_listed['progress_date']; ?></h5>
          <?php
            foreach($progress_listed['progress_items'] as $row) {
              echo "<div class='col-xs-12 progress-item'>";
              echo "<p>" . $row['title'] . "<span class='progress-percent'>" . $row['progress_value'] . "%</span></p>";
              echo "<div class='progress-bar-percent'><div class='progress-bar-inner' style='width:" . $row['progress_value'] . "%'></div></div><div class='gallery-border-line'></div></div>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
