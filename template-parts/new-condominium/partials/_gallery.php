<?php $galleries = get_field('gallery', get_the_ID()); ?>
<?php if ($galleries['gallery']) : ?>
<script>
  $(function () {
     $('.gallery-detail').each(function () {
       var gt = $(this).find('.gallery-top'),
         gb = $(this).find('.gallery-thumbs');
       //Init Thumbnail Slide
       //console.log(gt);
       var slideT = new Swiper(gb, {
         slidesPerView: 'auto',
         //loop: true,
         centeredSlides: true,
         centeredSlidesBounds: true,
         //freeMode: true,
         slideToClickedSlide: true,
         watchSlidesVisibility: true,
         watchSlidesProgress: true,
       });

       //Init Main Slide
       var slideM = new Swiper(gt, {
         slidesPerView: 1,
         spaceBetween: 10,
         autoHeight: true,
         centeredSlides: true,
         loop: true,
         //freeMode: true,
         //watchSlidesVisibility: true,
         //watchSlidesProgress: true,
         thumbs: {
           swiper: slideT,
         },
         navigation: {
           nextEl: gb.siblings('.swiper-button-next'),
           prevEl: gb.siblings('.swiper-button-prev'),
         },
       });
     });
  });
</script>
<section id="galleries">
  <div class="container">
    <?php if ($galleries['title']) : ?>
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section-title">
        <span class="title">
          <?=$galleries['title'];?>
        </span>
        </h2>
      </div>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="tabs-control col-sm-12">
        <ul class="nav nav-tabs">
          <?php $i=1; ?>
          <?php foreach ($galleries['gallery'] as $item) : ?>
            <li role="presentation" class="<?=$i === 1 ? 'active' : '';?>">
              <a href="#<?php echo "gallery_tab_" . $i; ?>" role="tab"
                 aria-controls="<?php echo "gallery_tab_" . $i; ?>" data-toggle="tab"><?=$item['title'];?></a>
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
          <?php foreach ($galleries['gallery'] as $item) : ?>
            <div id="<?php echo "gallery_tab_" . $i; ?>" role="tabpanel" class="tab-pane <?=$i === 1 ? 'active' : '';?>">
              <div id="gallery_<?=$i;?>" class="gallery-detail">
                <div class="inner">
                  <div id="gallery_top_<?=$i;?>" class="gallery-top swiper">
                    <div class="swiper-wrapper">
                    <?php foreach ($item['gallery'] as $img_path) : ?>
                      <a href="<?=$img_path['url'];?>" title="" class="swiper-slide">
                        <img src="<?=$img_path['url'];?>" alt="">
                      </a>
                    <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="gallery-thumbs-wrapper col-sm-12">
                    <div class="row">
                      <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                        <div id="gallery-thumbs-<?=$i;?>" class="gallery-thumbs swiper">
                          <div class="swiper-wrapper">
                          <?php foreach ($item['gallery'] as $img_path) : ?>
                            <div class="slide swiper-slide" style="background-image: url(<?=$img_path['url'];?>);"></div>
                          <?php endforeach; ?>
                          </div>
                        </div>
                        <div class="gallery-swiper-button swiper-button-prev">
                          <svg xmlns="http://www.w3.org/2000/svg" width="10.677" height="19.711" viewBox="0 0 10.677 19.711">
                            <g id="_002-down-arrow" data-name="002-down-arrow" transform="translate(10.677 0) rotate(90)">
                              <g id="Group_4" data-name="Group 4" transform="translate(0 0)">
                                <path id="Path_10" data-name="Path 10" d="M19.47.241a.82.82,0,0,0-1.161,0L9.855,8.694,1.4.241A.821.821,0,1,0,.241,1.4l9.034,9.034a.821.821,0,0,0,1.161,0L19.47,1.4A.82.82,0,0,0,19.47.241Z" fill="#fff"/>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="gallery-swiper-button swiper-button-next">
                          <svg xmlns="http://www.w3.org/2000/svg" width="10.677" height="19.711" viewBox="0 0 10.677 19.711">
                            <g id="_002-down-arrow" data-name="002-down-arrow" transform="translate(0 19.711) rotate(-90)">
                              <g id="Group_4" data-name="Group 4" transform="translate(0 0)">
                                <path id="Path_10" data-name="Path 10" d="M19.47.241a.82.82,0,0,0-1.161,0L9.855,8.694,1.4.241A.821.821,0,1,0,.241,1.4l9.034,9.034a.821.821,0,0,0,1.161,0L19.47,1.4A.82.82,0,0,0,19.47.241Z" fill="#fff"/>
                              </g>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>