<?php $floor_units_plan = get_field('floor-unit_plan', get_the_ID()); ?>
<section id="floor_units_plan">
  <div class="container-fluid">
    <?php if($floor_units_plan['title']) : ?>
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section-title">
          <span class="title">
            <?=$floor_units_plan['title'];?>
          </span>
        </h2>
      </div>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="tab-btn-wrapper">
          <button class="tab-btn active" data-toggle="floor_plan">Floor Plan</button>
          <button class="tab-btn" data-toggle="unit_plan">Unit Plan</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div id="floor_plan" class="floor-unit-tab">
          <?php $first_item = $floor_units_plan['floor_plans'][0]; ?>
          <a id="floorPlanLightbox" href="<?=$first_item['image'];?>" title="">
            <img id="floorPlanShow" src="<?=$first_item['image'];?>" alt="">
          </a>
          <div class="select-plan">
            <div class="custom-select">
              <select name="floor-plan-select-el" id="floorSelectDropdown">
                <option value="<?=$first_item['image'];?>"><?=$first_item['name'];?></option>
                <?php foreach ($floor_units_plan['floor_plans'] as $item) : ?>
                  <option value="<?=$item['image'];?>"><?=$item['name'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div id="unit_plan" class="floor-unit-tab" style="display: none;">
          <?php $first_item = $floor_units_plan['unit_plans'][0]; ?>
          <a id="unitPlanLightbox" href="<?=$first_item['image'];?>" title="">
            <img id="unitPlanShow" src="<?=$first_item['image'];?>" alt="">
          </a>
          <div class="select-plan">
            <div class="custom-select">
              <select name="unit-plan-select-el" id="unitSelectDropdown">
                <option value="<?=$first_item['image'];?>"><?=$first_item['name'];?></option>
                <?php foreach ($floor_units_plan['unit_plans'] as $item) : ?>
                  <option value="<?=$item['image'];?>"><?=$item['name'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
