<?php $page_ident = get_field('page_identities', get_the_ID());
$project_concept = get_field('project_concept', get_the_ID()); ?>

<section id="project_concept_tabs">
  <div class="container-fluid">
    <div class="row concept-tabs concept-d hidden-xs">
      <div class="tabs-control col-sm-3">
        <ul class="nav nav-pills nav-stacked">
          <?php $i=1; ?>
          <?php foreach ($project_concept['concepts'] as $item) : ?>
            <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
              <a href="#<?=create_tab_key($item['title']);?>" role="tab"
                 aria-controls="<?=create_tab_key($item['title']);?>" data-toggle="tab"><?=$item['title'];?></a>
            </li>
            <?php $i++; ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="tabs-contents col-sm-9">
        <div class="tab-content">
        <?php $i=1; ?>
        <?php foreach ($project_concept['concepts'] as $item) : ?>
            <div id="<?=create_tab_key($item['title']);?>" role="tabpanel" class="tab-pane <?=$i === 1 ? 'active' : '';?>">
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