<?php
/* Template name: Main Condo page */
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

<?php if($top_listed_projects) : ?>
<section id="project-top-listed">
	<div class="container">
		<div class="row">
			<div class="text-center slide-m">
        <?php foreach ($top_listed_projects as $top_listed_item) : ?>
          <a href="<?php echo get_the_permalink($top_listed_item); ?>" title=""><?php echo get_the_title($top_listed_item); ?></a>
        <?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

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

<?php if ($featured_group['d_featured_image'] || $featured_group['m_featured_image']) : ?>
<section id="featured">
	<div class="container">
		<div class="row">
      <div class="adv-wrapper col-sm-12">
        <img src="<?php echo $featured_group['d_featured_image'] ?>" alt="" class="hidden-xs">
        <img src="<?php echo $featured_group['m_featured_image'] ?>" alt="" class="visible-xs">
      </div>
    </div>
	</div>
</section>
<?php endif; ?>

<?php if( $our_projects ) : ?>
<section id="our-projects">
  <div class="container">
    <h2>โครงการของเรา</h2>
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
                  //$project_location = $project_info['project_location'];
                  ?>
                  <h3 class="title"><?php echo $our_project['project_title'] ?></h3>
                  <p class="location-start-price-row">
                    <span class="location"><?php echo $our_project['location'] ?></span>
                    <?php if ($our_project['start_price']) : ?>
                      <span class="start-price">เริ่ม <?php echo $our_project['start_price']; ?> ลบ.*</span>
                    <?php endif; ?>
                  </p>
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

<?php
get_sidebar();
get_footer();