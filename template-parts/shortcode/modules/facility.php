<?php $facilities = get_field('facility_1', get_the_ID());
$other_facilities = get_field('facility_2', get_the_ID());
echo 'time';
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/styles/modules/facility.css'; ?>">
<section id="facility_module">
  <div class="container-fluid">
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