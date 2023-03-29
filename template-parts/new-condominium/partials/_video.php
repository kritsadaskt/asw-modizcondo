<?php $medias = get_field('medias', get_the_ID());?>
<?php if ($medias['contents']) : ?>
<section id="media">
  <div id="header">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="section-title">
          <span class="title">
            <?=$medias['title'];?>
          </span>
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div id="tabs_nav">
    <div class="container">
      <div class="row">
        <div class="tabs-control col-sm-12">
          <ul class="nav nav-tabs">
            <?php $i=1; ?>
            <?php foreach ($medias['contents'] as $item) : ?>
              <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
                <a href="#<?=create_tab_key($item['title']);?>" role="tab"
                   aria-controls="<?=create_tab_key($item['title']);?>" data-toggle="tab"><?=$item['title'];?></a>
              </li>
              <?php $i++; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="tab_contents">
    <div class="tab-content">
      <?php $i=1; ?>
      <?php foreach ($medias['contents'] as $item) : ?>
        <div id="<?=create_tab_key($item['title']);?>" role="tabpanel" class="tab-pane <?=$i === 1 ? 'active' : '';?>">
          <div class="media-detail">
            <div class="inner">
              <?=$item['detail'];?>
            </div>
          </div>
        </div>
        <?php $i++; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>