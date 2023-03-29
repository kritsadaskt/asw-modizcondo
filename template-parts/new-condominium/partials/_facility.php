<?php $facilities = get_field('facility_1', get_the_ID());
$other_facilities = get_field('facility_2', get_the_ID());
$page_ident = get_field('page_identities', get_the_ID()); ?>
<!-- Check if Highlight Facility is defined -->
<?php if ($facilities['facility_1_items']) : ?>
<style>
    #facility_1 .tabs-control .nav li.active a,
    #facility_1 .tabs-control .nav li a:hover,
    #facility_1 .tabs-control .nav li a:focus {
        border-bottom-color: <?=$page_ident['main_color'];?>;
    }
</style>
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
    <div class="row hidden-xs">
      <div class="tabs-control col-sm-12">
        <ul class="nav nav-tabs">
          <?php $i=1; ?>
          <?php foreach ($facilities['facility_1_items'] as $item) : ?>
            <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
              <a href="#<?php echo('facility_tab_' . $i); ?>" role="tab"
                 aria-controls="<?php echo('facility_tab_' . $i); ?>" data-toggle="tab"><?=$item['title'];?></a>
            </li>
            <?php $i++; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="row hidden-xs">
      <div class="tabs-contents col-sm-12">
        <div id="facSlider" class="tab-content">
          <?php $i=1; ?>
          <?php foreach ($facilities['facility_1_items'] as $item) : ?>
            <div id="<?php echo('facility_tab_' . $i); ?>" role="tabpanel" class="tab-pane fac-card <?=$i === 1 ? 'active' : '';?>">
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
    <div class="row visible-xs">
      <div class="tabs-contents col-sm-12">
        <div id="facSlider_m" class="tab-content swiper-container">
          <div class="swiper-wrapper">
            <?php $i=1; ?>
            <?php foreach ($facilities['facility_1_items'] as $item) : ?>
              <div id="<?php echo('facility_tab_' . $i); ?>" role="tabpanel" class="swiper-slide fac-card <?=$i === 1 ? 'active' : '';?>">
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
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- Check if Other Facility is Defined -->
<?php if ($other_facilities['facility_2_items']) : ?>
<section id="other_facilities">
  <img src="https://assetwise.co.th/migrate/wp-content/uploads/2020/07/other_fac_bottom_left.png" alt=""
       class="bottom-left-border">
  <img src="https://assetwise.co.th/migrate/wp-content/uploads/2020/07/other_fac_bottom_right.png" alt=""
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
      <div id="icon_listed" class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <?php foreach ($other_facilities['facility_2_items'] as $item) : ?>
      <div class="fac-item">
        <img src="<?=$item['image'];?>" alt="<?=$item['title'];?>">
        <p><?=$item['title'];?></p>
      </div>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 visible-xs text-center">
        <button id="toggle_fac_icon">
          <span class="showAll"><?= __('แสดงเพิ่มเติม', 'Theme Texts'); ?></span>
          <span class="hideThem"><?= __('ซ่อน', 'Theme Texts'); ?></span>
        </button>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

