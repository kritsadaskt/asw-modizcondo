<?php
/* Template name: About us */
get_header();
$p = get_the_ID();
$heroBanners = acf_photo_gallery( 'hero_sliders', $p );
$detail_blocks = get_field('detail_blocks', $p);
?>

<?php
if ( count( $heroBanners ) > 1 ) {
	echo "<section id='top-slider'>";
	foreach ( $heroBanners as $bannerItem ) {
		echo "<div class='banner-item'>";
		echo "<img src='" . $bannerItem['full_image_url'] . "' alt=''>";
		echo "</div>";
	}
	echo "</div>";
} else {
	echo "<section id='hero-image' style='background-image:url(" . $heroBanners[0]['full_image_url'] . ");'></section>";
}
?>
  <div class="container-fluid nopadding sec-topicbar">
    <div class="container nopadding">
      <div class="col-xs-12 text-center">
        <div class="topicbar-left">
          <?php echo __('<span>เกี่ยวกับ</span><span class="blue-text"> ASSETWISE</span>', 'Theme texts'); ?>
        </div>
      </div>
    </div>
  </div>
  <section class="about-content">
    <div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			else: ?>
        <p>Sorry, no contents here.</p>
			<?php endif; ?>
    </div>
  </section>
  <?php if(get_field('is_about_video_active')) : ?>
  <section id="about-video">
    <div class="container">
      <div class="row">
        <div class="video-block col-sm-8 col-sm-offset-2">
          <div class="video-inner">
            <iframe src="<?php echo get_field('video_url', $p); ?>?rel=0&amp;controls=0&amp;showinfo=0"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="headline col-sm-12">
          <h2 class="video-headline text-center">" <?php echo get_field('headline', $p); ?> "</h2>
        </div>
      </div>
      <div class="details">
        <!-- Detail blocks -->
	      <?php $block_count = 1; ?>
	      <?php foreach ($detail_blocks as $item) : ?>
          <?php if($block_count % 2 === 1) : ?>
          <div class="row row-odd">
            <div class="col-xs-6 col-sm-5 img">
              <div class="detail-image" style="background-image: url('<?php echo $item['image']; ?>');"></div>
            </div>
            <div class="col-xs-6 col-sm-7 txt">
              <h4><?php echo $item['title'];?></h4>
              <p><?php echo $item['description']; ?></p>
            </div>
          </div>
          <?php else : ?>
          <div class="row row-even">
            <div class="col-xs-6 col-sm-7 txt">
              <h4><?php echo $item['title'];?></h4>
              <p><?php echo $item['description']; ?></p>
            </div>
            <div class="col-xs-6 col-sm-5 img">
              <div class="detail-image" style="background-image: url('<?php echo $item['image']; ?>');"></div>
            </div>
          </div>
          <?php endif; ?>
          <?php $block_count++; ?>
	      <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php if( get_field('is_about_gallery_active') ) : ?>
  <section id="gallery">
    <div class="container">
      <h1 class="about-gallery-title text-center">Gallery</h1>
      <div class="about-gallery-slide-wrapper">
				<?php
				$gallery = acf_photo_gallery( 'about_gallery', get_the_ID() );

				foreach ( $gallery as $g_item ) {
					echo "<div class='col-sm-4'>";
					echo "<a href='" . $g_item['full_image_url'] . "' class='gallery-item' title='' style='background-image: url(" . $g_item['full_image_url'] . ");'></a></div>";
				}
				?>
      </div>
      <div class="gallery-arrows visible-xs">
      </div>
    </div>
  </section>
  <script>
    $(document).ready(function () {
      var galleryWrapper = $(".about-gallery-slide-wrapper");
      if ($(window).width() < 520) {
        galleryWrapper.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          row: 1,
          arrows: true,
          appendArrows: ".gallery-arrows"
        });
      } else {
        galleryWrapper.slick({
          dots: true,
          arrows: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          rows: 2
        });
      }
    });
  </script>
  <?php endif; ?>
<?php
get_sidebar();
get_footer();
