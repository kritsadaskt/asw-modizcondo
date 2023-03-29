<?php
$page_ident = get_field('page_identities', get_the_ID());
$project_concept = get_field('project_concept', get_the_ID()); ?>
<?php if ($project_concept) : ?>
<style>
  <?php if ($page_ident['main_color']) : ?>
  #project_concept h2.section-title span.title {
      border-left: 4px solid <?=$page_ident['main_color'];?>;
      border-right: 4px solid <?=$page_ident['main_color'];?>;
  }
  #project_concept h2.section-title span.title,
  #project_concept_tabs .concept-tabs .tabs-control .nav li.active a,
  #project_concept_tabs .concept-tabs .tabs-control .nav li a:hover,
  #project_concept_tabs .concept-tabs .tabs-control .nav li a:focus{
      color: <?=$page_ident['main_color'];?>;
  }
  #project_concept .concept-box,
  #project_concept_tabs .concept-tabs .tabs-contents .concept-detail .left,
  #project_concept_tabs #concept_m .concept-detail .left{
      background-color: <?=$page_ident['main_color'];?>
  }
  <?php endif; ?>
  <?php if ($page_ident['secondary_color']) : ?>
  #project_concept_tabs .concept-tabs .tabs-contents .concept-detail .right,
  #project_concept_tabs #concept_m .concept-detail .right{
      background-color: <?=$page_ident['secondary_color'];?>
  }
  <?php endif; ?>
</style>

<section id="project_concept">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section-title">
          <span class="title">
            <?=$project_concept['title'];?>
          </span>
        </h2>
      </div>
    </div>
    <div class="row concept-box">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-7 left" style="background-image: url('<?=$project_concept['project_concept_image'];?>')"></div>
          <div class="col-sm-5 right">
            <div class="right-inner">
              <?=$project_concept['detail'];?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if ($project_concept['concepts']) : ?>
<section id="project_concept_tabs">
  <div class="container">
    <div class="row concept-tabs concept-d hidden-xs">
      <div class="tabs-control col-sm-3">
        <ul class="nav nav-pills nav-stacked">
          <?php $i=1; ?>
          <?php foreach ($project_concept['concepts'] as $item) : ?>
            <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
              <a href="#<?php echo('concept_tab_' . $i); ?>" role="tab"
                 aria-controls="<?php echo('concept_tab_' . $i); ?>" data-toggle="tab"><?=$item['title'];?></a>
            </li>
            <?php $i++; ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="tabs-contents col-sm-9">
        <div class="tab-content">
        <?php $i=1; ?>
        <?php foreach ($project_concept['concepts'] as $item) : ?>
            <div id="<?php echo('concept_tab_' . $i); ?>" role="tabpanel" class="tab-pane <?=$i === 1 ? 'active' : '';?>">
              <div class="concept-img">
                <img src="<?=$item['background_image'];?>" alt="">
              </div>
              <div class="concept-detail">
                <div class="left">
                  <div class="inner">
                    <?=$item['headline'];?>
                  </div>
                </div>
                <div class="right">
                  <?=$item['detail'];?>
                </div>
              </div>
            </div>
          <?php $i++; ?>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div id="concept_m" class="row visible-xs swiper-container">
      <div class="swiper-wrapper">
        <?php foreach ($project_concept['concepts'] as $item) : ?>
        <div class="concept-m-card swiper-slide">
          <div class="concept-img">
            <img src="<?=$item['background_image'];?>" alt="">
          </div>
          <div class="concept-detail">
            <div class="left">
              <div class="inner">
                <?=$item['headline'];?>
              </div>
            </div>
            <div class="right">
              <?=$item['detail'];?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
