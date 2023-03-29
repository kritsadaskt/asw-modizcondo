<?php $floor_units_plan = get_field('floor-unit_plan', get_the_ID()); ?>
<?php if ($floor_units_plan) : ?>
<section id="floor_units_plan">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section-title">
          <span class="title">
            <?=$floor_units_plan['title'];?>
          </span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="tab-btn-wrapper">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#floor_plan" data-toggle="tab" role="tab">Floor Plan</a></li>
            <li role="presentation"><a href="#unit_plan" data-toggle="tab" role="tab">Unit Plan</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 tab-content">
        <div id="floor_plan" role="tabpanel" class="floor-unit-tab tab-pane fade in active">
          <?php $first_item = $floor_units_plan['floor_plans'][0]; ?>
          <img id="floorPlanShow" src="<?=$first_item['image'];?>" alt="">
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
        <div id="unit_plan" role="tabpanel" class="floor-unit-tab tab-pane fade">
          <?php $first_item = $floor_units_plan['unit_plans'][0]; ?>
          <img id="unitPlanShow" src="<?=$first_item['image'];?>" alt="">
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
<?php endif; ?>