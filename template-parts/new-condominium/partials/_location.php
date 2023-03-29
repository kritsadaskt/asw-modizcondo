<?php $locations = get_field('location', get_the_ID());?>

<section id="location_section">
  <div class="top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="section-title">
            <span class="title"><?=$locations['title'];?></span>
          </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="view-map text-center">
            <?php foreach ($locations['map_links'] as $link) : ?>
              <a target="_blank" href="<?=$link['link']; ?>" title="<?=$link['title'];?>"><?=$link['title'];?></a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <a href="<?=$locations['maps_image'];?>" title="">
            <img src="<?=$locations['maps_image'];?>" alt="">
          </a>
        </div>
      </div>
      <?php if ($locations['nearby_place']) : ?>
      <div class="row">
        <div class="tabs-control col-sm-12">
          <ul class="nav nav-tabs">
            <?php $i=1; ?>
            <?php foreach ($locations['nearby_place'] as $item) : ?>
              <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
                <a href="#tab-content-<?=$i;?>" role="tab"
                   aria-controls="tab-content-<?=$i;?>" data-toggle="tab">
                  <img src="<?=$item['icon'];?>" alt="<?=$item['title'];?>">
                  <?=$item['title'];?>
                </a>
              </li>
              <?php $i++; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php if ($locations['nearby_place']) : ?>
  <div class="bottom">
    <div class="container">
      <div class="row">
        <div class="tabs-contents col-sm-10 col-sm-offset-1">
          <div class="tab-content">
            <?php $i=1; ?>
            <?php foreach ($locations['nearby_place'] as $item) : ?>
              <div id="tab-content-<?=$i;?>" role="tabpanel" class="tab-pane <?=$i === 1 ? 'active' : '';?>">
                <div class="inner">
                  <?=$item['detail'];?>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>
