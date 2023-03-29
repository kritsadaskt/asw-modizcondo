<?php
/* Template name: Home */
get_header();
$p             = get_the_ID();
$bottom_banner = acf_photo_gallery( 'bottom_banners', $p );
$heroBanners   = acf_photo_gallery( 'hero_sliders', $p );
$project_items = get_field('page_projects', $p);
$new_projects = $project_items['new_projects'];
$ready_to_move_in_projects = $project_items['ready_to_move_in_projects'];

$custom_banner = get_field('custom_banner_fields_group');
$cb_title = $custom_banner['section_title'];
$cb_link = $custom_banner['banner_link'];
$cb_d_img = $custom_banner['image_for_dt'];
$cb_m_img = $custom_banner['image_for_m'];
echo "<pre style='display: none;'>";
var_dump($heroBanners);
echo "</pre>";
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

			<?php
			if ( count( $heroBanners ) > 1 ) {
				echo "<section id='top-slider'>";
				foreach ( $heroBanners as $key=>$bannerItem ) {
					echo "<div class='banner-item'>";
					echo "<a href='" . $bannerItem['url'] . "' target='_blank'>";
					if($key == 0) {
					  echo wp_get_attachment_image( get_the_ID(), array('700', '600'));
            echo "<img alt='' src='" . $bannerItem['full_image_url'] . "'></a></div>";
          } else {
            echo "<img alt='' src='' data-lazy='" . $bannerItem['full_image_url'] . "'></a></div>";
          }
				}
				echo "</section>";
			} else {
				echo "<section id='hero-image' style='background-image:url(" . $heroBanners[0]['full_image_url'] . ");'></section>";
			}
			?>

      <section id="home-headline">
        <div class="container">
          <h1 class="text-center"><?php echo __('โครงการคุณภาพจาก AssetWise','Page Texts'); ?></h1>
        </div>
      </section>

      <section id="projects-list-wrapper">
        <div class="container no-padding-xs">
          <!-- Nav Pills -->
          <ul id="condo_nav" class="nav nav-pills nav-justified">
            <li class="active">
              <a id="new_project_menu" data-toggle="pill" href="#new_projects">
                <?php echo __('โครงการใหม่', 'Page Texts'); ?>
              </a></li>
            <li>
              <a id="ready_menu" data-toggle="pill" href="#ready_to_move_in">
                <?php echo __('โครงการพร้อมอยู่', 'Page Texts'); ?>
              </a></li>
            <li>
              <a id="filter_menu" data-toggle="pill" href="#filter_area" class="filter_menu">
                <?php echo __('ทำเลที่ต้องการ', 'Page Texts'); ?>
              </a></li>
          </ul>
          <!-- Tab Content -->
          <div class="tab-content">

            <div id="new_projects" class="condo fade in tab-pane active">
              <!-- Desktop Project List -->
              <div class="desktop-list">
								<?php foreach ($new_projects as $item) : ?>
									<?php require 'parts/project-item.php'; ?>
								<?php endforeach; ?>
              </div>
            </div>

            <div id="ready_to_move_in" class="condo fade tab-pane">
              <!-- Desktop Project List -->
              <div class="desktop-list">
	              <?php foreach ($ready_to_move_in_projects as $item) : ?>
		              <?php require 'parts/project-item.php'; ?>
	              <?php endforeach; ?>
              </div>
            </div>
            <div id="filter_area" class="condo fade tab-pane">
              <div class="filter_area_pane">
                <div class="close">
                  <i class="fa fa-times"></i>
                </div>
                <h3 class="text-center">
                  <?php echo __('เลือกทำเลที่ต้องการ', 'Page Texts'); ?>
                </h3>
                <div class="options-wrapper">
	                <?php
	                $locations = post_type_tags( 'condominium' );
	                foreach ( $locations as $location ) {
		                //Case EN
		                if (get_bloginfo('language') === 'en-US') {
			                if (strpos($location->slug, '-en') !== false) {
				                echo show_project_checkbox($location);
			                }
		                }
		                //Case CN
		                else if (get_bloginfo('language') === 'zh-CN') {
			                if (strpos($location->slug, '-zh-hans') !== false) {
				                echo show_project_checkbox($location);
			                }
		                }
		                //Case TH
		                else {
			                if (strpos($location->slug, '-en') === false && strpos($location->slug, '-zh-hans') === false) {
				                echo show_project_checkbox($location);
			                }
		                }
	                }
	                ?>
                </div>
                <div class="filter_area_submit_pane text-center">
                  <button id="filter_area_submit_btn" type="button">
                    <?php echo __('ค้นหา', 'Page Texts'); ?>
                  </button>
                </div>
              </div>
              <!-- Desktop Project List -->
              <div class="desktop-list">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php require 'parts/project-item.php'; ?>
								<?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="projects-type-select">
        <a class="project-type condo" href="<?php echo get_permalink( get_page_by_path( 'condominium' ) ); ?>"
           target="_blank" title="โครงการคอนโดทั้งหมด">
          <div class="button-text-wrapper">
            <?php echo __('
            <p>โครงการ</p>
            <p>คอนโดทั้งหมด</p>', 'Page Texts'); ?>
          </div>
        </a>
        <a class="project-type house" href="<?php echo get_permalink( get_page_by_path( 'house' ) ); ?>" target="_blank"
           title="โครงการบ้านทั้งหมด">
          <div class="button-text-wrapper">
            <?php echo __('
            <p>โครงการ</p>
            <p>บ้านทั้งหมด</p>', 'Page Texts'); ?>
          </div>
        </a>
      </section>

      <section id="online-pre_approve">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="section-title">ASSETWISE <span>HEALTH SOLUTIONS</span></h2>
              <a href="https://assetwise.co.th/healthsolutions" title="AssetWise Health Solutions" target="_blank">
                <img src="https://assetwise.co.th/migrate/wp-content/uploads/2020/06/health_sol-banner_d.jpg" alt="AssetWise Health Solutions" class="hidden-xs">
                <img src="https://assetwise.co.th/migrate/wp-content/uploads/2020/06/health_sol-banner_m.jpg" alt="AssetWise Health Solutions" class="visible-xs">
              </a>
            </div>
          </div>
        </div>
      </section>

      <?php if(get_field('is_active_blogs_section', $p)) : ?>
      <section id="featured-blogs" class="contents">
        <div class="container">
          <div class="row">
            <div class="col-xs-6 col-sm-6">
              <h2 class="section-title">ASSETWISE <span>BLOG</span></h2>
            </div>
            <div class="text-right col-sm-3 col-sm-offset-3">
              <a class="see-all" target="_blank" href="<?php echo get_permalink( get_page_by_path( "blog" ) ) ?>">
                <?php echo __('ดูบล็อกทั้งหมด', 'Page Texts'); ?>
                <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="featured-blog-wrapper">
						<?php
						$blog = new WP_Query( array(
							'post_type' => 'blog',
							'showposts' => 3,
							'order'     => 'DESC',
						) );

						$i = 0;
						?>
						<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
              <div class="featured-blog-item <?php echo ( $i == 0 ) ? 'first' : ''; ?>">
                <a href="<?php the_permalink(); ?>"
                   target="_blank"
                   title="<?php the_title(); ?>"
                   style="background-image: url('<?php the_post_thumbnail_url( "full" ) ?>');">
                  <div class="intro">
                    <h3 class="post-title">
											<?php the_title(); ?>
                    </h3>
                    <p class="date">
                      <span><?php the_date(); ?></span>
                    </p>
                  </div>
                </a>
              </div>
							<?php
							$i ++;
							?>
						<?php endwhile; ?>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <?php if(get_field('is_active_front_page_custom_banner', $p)) : ?>
      <section id="online-pre_approve">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="section-title"><?php echo $cb_title; ?></h2>
              <a href="<?php echo $cb_link; ?>" title="" target="_blank">
                <img src="<?php echo $cb_d_img; ?>" alt="" class="hidden-xs">
                <img src="<?php echo $cb_m_img; ?>" alt="" class="visible-xs">
              </a>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <?php if(get_field('is_active_news_section', $p)) : ?>
      <section id="featured-news" class="contents">
        <div class="container">
          <div class="row">
            <div class="col-xs-6 col-sm-6">
              <h2 class="section-title">ASSETWISE <span>NEWS</span></h2>
            </div>
            <div class="text-right col-sm-3 col-sm-offset-3">
              <a class="see-all" target="_blank"
                 href="<?php echo get_permalink( get_page_by_path( "assetwise-club" ) ) ?>">
                <?php echo __('ดูข่าวสารทั้งหมด', 'Page Texts'); ?>
                <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="featured-news-wrapper">
						<?php
						$news = new WP_Query( array(
							'post_type' => 'news_activities',
							'showposts' => 3,
							'order'     => 'DESC',
						) );

						$i = 0;
						?>
            <div class="row">
							<?php while ( $news->have_posts() ) : $news->the_post(); ?>
                <div class="featured-news-item col-sm-4">
                  <a href="<?php the_permalink(); ?>"
                     target="_blank"
                     title="<?php the_title(); ?>">
                    <div class="thumb">
                      <img src="<?php the_post_thumbnail_url( "full" ) ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="intro">
                      <h3 class="post-title">
												<?php the_title(); ?>
                      </h3>
                    </div>
                  </a>
                </div>
								<?php
								$i ++;
								?>
							<?php endwhile; ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <?php if($bottom_banner) : ?>
      <section id="bottom-banner">
        <div class="container">
          <div class="banner-wrapper <?php echo count($bottom_banner) > 1 ? 'slide':''; ?>">
						<?php
						if ( count( $bottom_banner ) > 1 ) {
						  $b = 1;
							foreach ( $bottom_banner as $banner ) {
							  if ($b === 1) {
							    $src = 'src';
                } else {
							    $src = 'data-lazy';
                }
								$slide = "<div class='slide-" . $b . "'>";
								$slide .= "<a href='" . $banner['url'] . "' target='_blank' title='" . $banner['title'] . "'>";
								$slide .= "<img ".$src."='" . $banner['full_image_url'] . "' alt='". $banner['title'] ."'></a></div>";
								echo $slide;
								$b++;
							}
						} else {
						  $banner_item = $bottom_banner[0];
						  echo "<a href='" . $banner_item['url'] . "' target='_blank' title='" . $banner_item['title'] . "'><img src='" . $banner_item['full_image_url'] . "' alt='" . $banner_item['title'] . "'></a>";
            }
						?>
          </div>
        </div>
      </section>
      <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();


