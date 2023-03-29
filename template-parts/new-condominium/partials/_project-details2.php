<?php
$page_ident = get_field('page_identities', get_the_ID());
$project_details = get_field('project_details', get_the_ID());?>
<style type="text/css">
    #project_details .download-brochure a {
        background-color: <?=$page_ident['main_color'];?>
    }
</style>
<section id="project_details" class="project_details2">
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
        <div class="col-sm-4 col-md-6  project-detail-img">
          <div class="row">
            <img src="<?=$project_details['image'];?>" alt="">
          </div>
        </div>
        <div class="col-sm-8 col-md-6 project-detail-txt">
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
