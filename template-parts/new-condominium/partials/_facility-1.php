<?php $facilities = get_field('facility_1', get_the_ID());
$other_facilities = get_field('facility_2', get_the_ID()); ?>

<section id="facility_1">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section-title">
          <span class="title">
            <?=$facilities['title'];?>
          </span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="tabs-control col-sm-12">
        <ul class="nav nav-tabs">
          <?php $i=1; ?>
          <?php foreach ($facilities['facility_1_items'] as $item) : ?>
            <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
              <a href="#<?=create_tab_key($item['title']);?>" role="tab"
                 aria-controls="<?=create_tab_key($item['title']);?>" data-toggle="tab"><?=$item['title'];?></a>
            </li>
            <?php $i++; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="tabs-contents col-sm-12">
        <div class="tab-content">
          <?php $i=1; ?>
          <?php foreach ($facilities['facility_1_items'] as $item) : ?>
            <div id="<?=create_tab_key($item['title']);?>" role="tabpanel" class="tab-pane <?=$i === 1 ? 'active' : '';?>">
              <div class="fac-img visible-xs" style="background-image: url('<?=$item['image'];?>')"></div>
              <div class="fac-detail">
                <div class="inner">
                  <h4><?=$item['title'];?></h4>
                  <div class="txt"><?=$item['detail'];?></div>
                </div>
              </div>
              <div class="fac-img hidden-xs" style="background-image: url('<?=$item['image'];?>')"></div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="other_facilities">
  <img src="http://assetwise.ddev.site/wp-content/uploads/2020/07/other_fac_bottom_left-1.png" alt=""
       class="bottom-left-border">
  <img src="http://assetwise.ddev.site/wp-content/uploads/2020/07/other_fac_bottom_right.png" alt=""
       class="top-right-border">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section-title">
          <span class="title">
            <?=$other_facilities['title'];?>
          </span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <?php foreach ($other_facilities['facility_2_items'] as $item) : ?>
      <div class="fac-item">
        <img src="<?=$item['image'];?>" alt="<?=$item['title'];?>">
        <p><?=$item['title'];?></p>
      </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
