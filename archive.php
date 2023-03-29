<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AssetWise
 */

/* Template name: Archive */

get_header();
$blog = get_page_by_path('blog');
$blog_id = $blog->ID;
$heroBanners = acf_photo_gallery('hero_sliders', $blog_id);
?>

<?php
if (count($heroBanners) > 1) {
  echo "<section id='top-slider'>";
  foreach ($heroBanners as $bannerItem) {
    echo "<div class='banner-item'>";
    echo "<img src='" . $bannerItem['full_image_url'] . "' alt=''>";
    echo "</div>";
  }
  echo "</div>";
} else {
  echo "<section id='hero-image' style='background-image:url(" . $heroBanners[0]['full_image_url'] . ");'></section>";
}
?>
<?php
$tax = $wp_query->get_queried_object();
$cat_name = $tax->cat_name;
$term_id = $tax->term_id;

$args = array(
  'post_type'              => array( 'blog' ),
  'nopaging'               => false,
  'orderby'                => 'date',
  'post_status'            => 'publish',
  'tax_query' => array(
    array(
      'taxonomy'  => 'category',
      'terms'     => $term_id,
      'field'     => 'term_id',
    )
  ),
);

$post_query = new WP_Query( $args );

$data = array_map(
  function( $post ) {
    return (array) $post;
  },
  $post_query->posts
);

wp_reset_postdata();

?>
  <div class="sec-topicbar">
    <div class="container">
      <div class="topicbar-left"><?php echo $cat_name; ?></div>
      <div class="topicbar-right hidden-xs">
        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/infobar-logo.png" alt="">
      </div>
    </div>
  </div>

  <div id="primary" class="content-area">
    <main id="main" class="site-main container">
      <div class="row">
        <?php foreach ($data as $post): ?>
          <div class="blog-item-wrapper col-xs-12 col-sm-6 col-md-4">
            <div class="blog-item">
              <?php
              $post_thumb = get_the_post_thumbnail_url($post['ID']);
              if ($post_thumb == '') {
                $post_thumb = 'https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/assetwise_no_img.png';
              }
              ?>
              <div class="post_thumbnail" style="background-image: url('<?php echo $post_thumb; ?>')"></div>
              <div class="post_detail">
                <h3 class="post_title"><?php echo $post['post_title']; ?></h3>
                <p class="blog-post-intro"><?php echo mb_substr(strip_tags($post['post_content']), 0, 150); ?></p>
                <p class="blog-post-info">
                  <span class="date"><?php echo date('F j, Y'); ?></span>
                  by <span class="author"><?php echo get_the_author_meta('first_name', $post['post_author']); ?></span>
                </p>
                <p class="read_more"><a class="btn btn-readmore" title="<?php echo $post['post_title']; ?>" target="_blank" href="<?php echo get_permalink($post['ID']); ?>">Read more</a></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->
  <script>
    $(function () {
      $('.blog-item').matchHeight();
    });
  </script>

<?php
get_sidebar();
get_footer();
