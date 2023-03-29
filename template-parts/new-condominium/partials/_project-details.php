<?php
$project_details = get_field('project_details', get_the_ID());?>
<section id="project_details">
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="section-title">
          <span class="title">
            <?=$project_details['title'];?>
          </span>
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="detail-box">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-4  project-detail-img">
          <img src="<?=$project_details['image'];?>" alt="">
        </div>
        <div class="col-sm-8 col-md-8 project-detail-txt">
          <div class="inner">
            <?=$project_details['details'];?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="download-brochure">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-sm-offset-5">
          <a href="<?=$project_details['brochure_download_link'];?>" title="E-Brochure Download" target="_blank">
            <?=__('ดาวน์โหลดโบรชัวร์', 'Modiz Rhyme Texts');?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
