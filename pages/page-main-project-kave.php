<?php
/* Template name: Main Condo page - Kave */
/**
 * Created by PhpStorm.
 * User: jokerdez
 * Date: 18/9/2018 AD
 * Time: 16:09
 */
get_header();
$p = get_the_ID();
$heroBanners = acf_photo_gallery( 'hero_sliders', $p );
$top_listed_projects = get_field('projects_top_listed', $p);
$featured_bg_color = get_field('featured_bg_color', $p);
$featured_bg_image = get_field('featured_bg_image', $p);
$featured_group = get_field('featured_section', $p);
$our_projects = get_field('our_projects', $p);
$our_projects_styles = get_field('our_project_sections_style', $p);
?>

<style>
  <?php if($featured_bg_color !== '' && $featured_bg_image === '') : ?>
    #featured {
      background-color: <?php echo $featured_bg_color; ?>;
    }
  <?php elseif($featured_bg_color === '' && $featured_bg_image !== '' ) : ?>
  #featured {
    background-image: url("<?php echo $featured_bg_image; ?>");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  <?php elseif($featured_bg_image !== '' && $featured_bg_color !== '') : ?>
    #featured {
      background: <?php echo $featured_bg_color; ?> url("<?php echo $featured_bg_image; ?>") center bottom no-repeat;
      background-size: cover;
    }
  <?php endif; ?>
  <?php if($our_projects_styles['bg_color']) : ?>
    #our-projects {
      background-color: <?php echo $our_projects_styles['bg_color']; ?>;
    }
  <?php endif; ?>
  <?php if($our_projects_styles['block_color']) : ?>
    #our-projects .our-project {
      background-color: <?php echo $our_projects_styles['block_color']; ?>;
    }
  <?php endif; ?>
  <?php if($our_projects_styles['title_color']) : ?>
    #our-projects .our-project .details .title {
      color: <?php echo $our_projects_styles['title_color']; ?>;
    }
  <?php endif; ?>
  <?php if($our_projects_styles['text_color']) : ?>
    #our-projects .our-project .details .location-start-price-row,
    #our-projects .our-project .details .short-desc,
    #our-projects .our-project .details .location-start-price-row .start-price{
      color: <?php echo $our_projects_styles['text_color']; ?>;
    }
  <?php endif; ?>
  <?php
    if(get_field('custom_css', $p) !== '') {
      echo get_field('custom_css', $p);
    }
  ?>
</style>
<?php
	if ( count( $heroBanners ) > 1 ) {
		echo "<section id='top-slider'>";
		foreach ( $heroBanners as $bannerItem ) {
			echo "<div class='banner-item'>";
			echo "<a href='" . $bannerItem['url'] . "' title='' target='_blank'>";
			echo "<img src='" . $bannerItem['full_image_url'] . "' alt=''></a>";
			echo "</div>";
		}
		echo "</section>";
	} else {
		echo "<section id='hero-image-wrapper'>";
		echo "<a href='" . $heroBanners[0]['url'] . "' title='' target='_blank'>";
		echo "<img src='" . $heroBanners[0]['full_image_url'] . "' alt=''></a>";
		echo "</section>";
	}
?>

<section id="featured">
	<div class="container">
		<div class="row">
      <div class="intro col-sm-5">
          <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/intro-top.png" class="top-img" />
          <p>
            โครงการที่ตอบโจทย์ไลฟ์สไตล์คนรุ่นใหม่ทุกแอคทิวิตี้<br/>
            ปรับเปลี่ยนให้เข้ากับไลฟ์สไตล์ของคุณ ตั้งแต่การเดินทาง<br/>
            ที่สะดวกสบายใกล้มหาลัย แหล่งรวมคอมมูนิตี้ที่ครบครัน<br/>
            ส่วนกลางขนาดใหญ่หลากหลาย ตอบโจทย์การใช้ชีวิตนักศึกษา<br/>
            <span class="bold">ไม่ว่าคุณจะเป็นแบบไหน<br class="visible-sm"/> KAVE ก็ให้คุณสุดได้ในทุกด้าน</span>
          </p>
      </div>
      <div class="block-container col-sm-7">
          <div class="row">
              <div class="col-xs-12 col-sm-8" style="padding:0px;">
                  <div class="hilight-item">
                      <div class="hilight-inner">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-1.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Campus</h1>
                                <h3>
                                  Condominium <br/>
                                  Nearby University
                                </h3>
                                <p>
                                  ใกล้มหาลัย สามารถเดินไปเรียนได้
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="hilight-item">
                      <div class="hilight-inner">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-2.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Extensive</h1>
                                <h3>
                                  Facility
                                </h3>
                                <p>
                                  ส่วนกลางขนาดใหญ่ หลากหลาย ตอบโจทย์การใช้ชีวิตนักศึกษา
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="hilight-item">
                      <div class="hilight-inner high">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-3.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Smart</h1>
                                <h3>
                                  Technology
                                </h3>
                                <p>
                                  สมาร์ทเทคโนโลยี<br/>
                                  ตอบโจทย์ไลฟ์สไตล์คนรุ่นใหม่
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="hilight-item">
                      <div class="hilight-inner">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-4.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Adaptive</h1>
                                <h3>
                                  Functional Space
                                </h3>
                                <p>
                                  ปรับเปลี่ยนฟังก์ชันได้ง่าย<br/>
                                  ตอบรับทุกความต้องการ
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="hilight-item">
                      <div class="hilight-inner">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-5.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Best</h1>
                                <h3>
                                  Investment
                                </h3>
                                <p>
                                  คุ้มค่าการลงทุน ทั้งปล่อยเช่าและ<br class="hidden-xs hidden-sm"/>
                                  ขายต่อ ผลตอบแทนดี
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-4" style="padding:0px;">
                  <div class="hilight-item hilight2">
                      <div class="hilight-inner high xs-no-high">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-6.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Lifestyle</h1>
                                <h3>
                                  Community
                                </h3>
                                <p>
                                  แหล่งคอมมูนิตี้ ที่ครบครัน <br/>
                                  ตอบโจทย์การใช้ชีวิตในทุกๆด้าน
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="hilight-item hilight2">
                      <div class="hilight-inner">
                          <div class="hilight-inner-wrapper">
                              <div class="img-container">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/hilight-7.png" class="hilight-img" />
                              </div>
                              <div class="text-container">
                                <h1>Modern</h1>
                                <h3>
                                  Design
                                </h3>
                                <p>
                                  ดีไซน์ทันสมัย<br/>
                                  โดดเด่นเป็นเอกลักษณ์
                                </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
	</div>
</section>

<?php if( $our_projects ) : ?>
<section id="our-projects">
  <div class="container">
    <h2>Projects</h2>
    <div class="row">
      <?php if($our_projects) : ?>
        <?php
          $class = '';
          $count = 1;
          if(count($our_projects) < 3) {
            $class = 'col-sm-offset-2';
          }
        ?>
	      <?php foreach ($our_projects as $our_project) : ?>
          <div class="col-sm-4 <?php echo $count === 1 ? $class:''; ?>">
            <a href="<?php echo get_permalink($our_project['project']); ?>" title="<?php echo get_the_title($our_project['project']); ?>">
              <div class="our-project">
                <div class="featured-image"
                     style="background: #000 url('<?php echo get_the_post_thumbnail_url($our_project['project']); ?>') center no-repeat; background-size: cover;"></div>
                <div class="details">
                  <?php
                  $project_info = get_field('project_information', $our_project['project']);
                  $project_location = $project_info['project_location'];
                  ?>
                  <h3 class="title"><?php echo $our_project['project_title'] ?></h3>
                  <p class="location-start-price-row">
                    <span class="location"><?php echo $project_location; ?></span>
                    <!-- <span class="start-price">เริ่ม <?php echo $our_project['start_price']; ?> ลบ.*</span> -->
                  </p>
                  <div class="sep-line"></div>
                  <p class="short-desc"><?php echo $our_project['project_short_desc']; ?></p>
                </div>
              </div>
            </a>
          </div>
	      <?php $count++; endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section id="contact-us">
  <div class="container">
    <h2>Contact us</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-2 contact-info">
            <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-logo.png" class="assetwise-logo" />
            <p>
              บริษัท แอสเซทไวส์ จำกัด (มหาชน)<br/>
              9 ซอยรามอินทรา 5 แยก 23 แขวงอนุสาวรีย์ เขตบางเขน <br/>
              กรุงเทพฯ 10220
            </p>
            <a href="tel:021680000" class="tel">
              <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-tel.png" /> 02-168-0000
            </a>
            <div class="link-container">
                <a href="https://www.google.com/maps/place/Kave+Club/@14.0414881,100.6138142,18z/data=!3m1!4b1!4m5!3m4!1s0x30e2811c24ce8d79:0xf9c50339f07ba680!8m2!3d14.0418399!4d100.616221" target="_blank" class="link-button">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-pin.png" /> kave club
                </a>
                <a href="https://www.facebook.com/kavecommunity/" target="_blank" class="link-button">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-fb.png" /> Facebook
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 kave-link">
            <a href="https://assetwise.co.th/condominium/kavetown-shift/" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-kave-town-shift.png" />
            </a>
            <a href="https://assetwise.co.th/condominium/kavetownspace/" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-kave-town.png" />
            </a>
            <a href="https://assetwise.co.th/condominium/kavetu/" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/images/mainpage-project/kave/contact-kave-tu.png" />
            </a>
        </div>
    </div>
  </div>
</section>

<script>
jQuery( ".hover-menu, .project-container" ).hover(function() {
  jQuery(".project-container").addClass("show");
  jQuery(".project-container").delay(20).queue(function() {
      jQuery(".project-container").addClass("show2");
      jQuery(".project-container").dequeue();
  });
  }, function() {
    jQuery(".project-container").removeClass("show2");
    // jQuery(".project-item").removeClass("active2");
    jQuery(".project-container").removeClass("show");
    // jQuery(".project-container").delay(100).queue(function() {
    //     jQuery(".project-container").removeClass("show2");
    //     jQuery(".project-item").removeClass("active2");
    //     jQuery(".project-item").delay(20).queue(function() {
    //         jQuery(".project-container").removeClass("show");
    //         jQuery(".project-item").dequeue();
    //     });
    //     jQuery(".project-container").dequeue();
    // });

});

jQuery( ".kave-town-hover" ).hover(function() {
  jQuery(".project-item").removeClass("active");
  jQuery(".kave-town-item").addClass("active");
  jQuery(".kave-town-item").delay(300).queue(function() {
      jQuery(".kave-town-item").addClass("active2");
      jQuery( ".kave-town-hover" ).delay(20).queue(function() {
          jQuery( ".kave-town-hover" ).dequeue();
      });
      jQuery(".kave-town-item").dequeue();
  });
});
jQuery( ".kave-tu-hover" ).hover(function() {
  jQuery(".project-item").removeClass("active");
  jQuery(".kave-tu-item").addClass("active");
  jQuery(".kave-tu-item").delay(300).queue(function() {
      jQuery(".kave-tu-item").addClass("active2");
      jQuery( ".kave-tu-hover" ).delay(20).queue(function() {
          jQuery( ".kave-tu-hover" ).dequeue();
      });
      jQuery(".kave-tu-item").dequeue();
  });
});
jQuery( ".community-hover" ).hover(function() {
  jQuery(".project-item").removeClass("active");
  jQuery(".community-item").addClass("active");
  jQuery(".community-item").delay(300).queue(function() {
      jQuery(".community-item").addClass("active2");
      jQuery( ".community-hover" ).delay(20).queue(function() {
          jQuery( ".community-hover" ).dequeue();
      });
      jQuery(".community-item").dequeue();
  });
});
jQuery( ".kave-club-hover" ).hover(function() {
  jQuery(".project-item").removeClass("active");
  jQuery(".kave-club-item").addClass("active");
  jQuery(".kave-club-item").delay(300).queue(function() {
      jQuery(".kave-club-item").addClass("active2");
      jQuery( ".kave-club-hover" ).delay(20).queue(function() {
          jQuery( ".kave-club-hover" ).dequeue();
      });
      jQuery(".kave-club-item").dequeue();
  });
});
setTimeout(function(){
  if($(window).width() < 576) {
  jQuery('#project-top-listed').find('.slide-m2').slick ({
        slidesToShow: 2,
        centerMode: true,
        focusOnSelect: true,
        variableWidth: true,
        infinite: false,
        arrows: false,
        dots: false
      });
  }
}, 3000);



</script>

<?php
get_sidebar();
get_footer();
