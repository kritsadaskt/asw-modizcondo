<?php
/* Template name: Blog */
get_header();
$p = get_the_ID();
$heroBanners = acf_photo_gallery('hero_sliders', $p);
$cat_blog = get_category_by_slug('blog');
?>

  <div id="blog">

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

    <div class="sec-topicbar">
      <div class="container">
        <div class="topicbar-left">
          <?php echo __('Read Around', 'ASW Section Title'); ?>
        </div>
        <div class="topicbar-right hidden-xs">
          <img src="<?php echo get_template_directory_uri(); ?>/images/blog/infobar-logo.png" alt="">
        </div>
      </div>
    </div>

    <section class="blogs-content">
      <?php
      $featured_post = get_field('highlight_post', $p);
      ?>

      <div id="container">
        <section id="featured-blogs">
          <div class="container">
            <div id="featured-wrapper">
              <?php $i = 1; ?>
              <?php foreach ($featured_post as $post) : ?>
                <?php if ($i === 1) : ?>
                <a title="<?php echo $post->post_title ?>" href="<?php echo get_permalink($post->ID); ?>" class="first featured" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>')">
                  <div class="featured-content-box">
                    <div class="cat-line">
                      <span class="cat">
                        <?php echo get_cat_name($post->post_category[0]); ?>
                      </span>
                    </div>
                    <h3 class="featured-title"><?php echo $post->post_title; ?></h3>
                    <p class="date">
                      <?php echo get_the_date('j F Y', $post->ID); ?>
                    </p>
                  </div>
                </a>
                <?php else : ?>
                <a title="<?php echo $post->post_title ?>" href="<?php echo get_permalink($post->ID); ?>" class="featured" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>')">
                  <div class="featured-content-box">
                    <div class="cat-line">
                  <span class="cat">
                    <?php echo get_cat_name($post->post_category[0]); ?>
                  </span>
                    </div>
                    <h3 class="featured-title"><?php echo $post->post_title; ?></h3>
                    <p class="date">
                      <?php echo get_the_date('j F Y', $post->ID); ?>
                    </p>
                  </div>
                </a>
                <?php endif; ?>
                <?php $i++; ?>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
        <div id="blog-nav-space"></div>
        <section id="blogs-nav">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <nav class="navbar">
                  <?php $categories = get_categories(array('child_of' => $cat_blog->term_id)); ?>
                  <ul class="nav navbar-nav">
                    <li>
                      <a href="<?php echo get_home_url(); ?>/category/blog" target="_blank" title="<?php echo __('ทั้งหมด', 'Theme texts'); ?>">
                        <?php echo __('ทั้งหมด', 'Theme texts'); ?></a>
                    </li>
                    <?php foreach ($categories as $category) : ?>
                      <li>
                        <a href="#<?php echo $category->slug; ?>" title=""><?php echo $category->name; ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section id="blogs-wrapper">
          <div class="container">
            <?php $blogs_row = get_field('blog_category_order', $p); ?>
            <div class="row">
              <div class="col-sm-8 blogs-left-column">
                <?php foreach ($blogs_row as $row) : ?>
                <?php $tmpl = $row['template']; ?>
                <div id="<?php echo $row['category']->slug; ?>" class="blogs-cat template-<?php echo $tmpl; ?>">
                  <div class="header">
                    <h3 class="cat-title"><?php echo $row['category']->name; ?></h3>
                    <a href="<?php echo get_home_url().'/category/blog/'.$row['category']->slug; ?>" target="_blank"
                       title="<?php echo $row['category']->name; ?>" class="cat-header_see-more"><?php echo __('ดูทั้งหมด','Theme texts'); ?></a>
                  </div>
                  <?php
                  $tag_id = $row['category']->term_taxonomy_id;
                  $posts = getBlogPosts($tag_id);

                  //Template 1
                  if ($tmpl == 1) {
                    echo '<div class="row">';
                    $i = 1;
                    foreach ($posts as $post) {
                      if ($i <= 2) {
                        echo '<div class="blog-tmpl1-item col-xs-12 col-sm-6">';
                        echo '<div class="blog-post-thumbnail" style="background-image: url(' . get_the_post_thumbnail_url($post['ID']) . '" title="' . $post['post_title'] . ');"></div>';
                        echo '<h4 class="blog-post-title">' . $post['post_title'] . '</h4>';
                        echo '<p class="blog-post-intro">' . mb_substr(strip_tags($post['post_content']), 0, 150) . '</p>';
                        echo '<p class="blog-post-info">';
                        echo '<span class="date">' . date('F j, Y') . '</span>  ';
                        echo 'by <span class="author">' . get_the_author_meta('first_name', $post['post_author']) . '</span>';
                        echo '</p>';
                        echo '<p class="read_more"><a class="btn btn-readmore" title="'.$post['post_title'].'" target="_blank" href="'.get_permalink($post['ID']).'">Read more</a></p>';
                        echo '</div>';
                      }
                      $i++;
                    }
                    echo '</div>';
                  } else if ($tmpl == 2) {    //Template 2
                    echo '<div class="row">';
                    echo '<div class="col-sm-6 blog-tmpl2-left">';
                    $d = 1;
                    foreach ($posts as $post) {
                      if ($d == 1) {
                        echo '<a title="'.$post['post_title'].'" target="_blank" href="'.get_permalink($post['ID']).'">';
                        echo '<div class="blog-tmpl2-left-item" style="background-image: url('. get_the_post_thumbnail_url($post['ID']) .')">';
                        echo '<div class="blog-tmpl2-left-item-detail">';
                        echo '<h4 class="blog-post-title">' . $post['post_title'] . '</h4>';
                        echo '<p class="blog-post-info">';
                        echo '<span class="date">' . date('F j, Y') . '</span>  ';
                        echo 'by <span class="author">' . get_the_author_meta('first_name', $post['post_author']) . '</span>';
                        echo '</p>';
                        echo '</div></div>';
                        echo '</a>';
                      }
                      $d++;
                    }
                    echo '</div>';
                    //-----------
                    echo '<div class="col-sm-6 blog-tmpl2-right">';
                    $e = 1;
                    foreach ($posts as $post) {
                      if ($e != 1) {
                        echo '<a title="'.$post['post_title'].'" target="_blank" href="'.get_permalink($post['ID']).'">';
                        echo '<div class="blog-tmpl2-right-item">';
                        echo '<div class="blog-post-thumbnail" style="background-image: url(' . get_the_post_thumbnail_url($post['ID']) . '" title="' . $post['post_title'] . ');"></div>';
                        echo '<div class="blog-post-tml2-detail">';
                        echo '<h4 class="blog-post-title">' . $post['post_title'] . '</h4>';
                        echo '<p class="blog-post-info">';
                        echo '<span class="date">' . date('F j, Y') . '</span>  ';
                        echo 'by <span class="author">' . get_the_author_meta('first_name', $post['post_author']) . '</span>';
                        echo '</p>';
                        echo '</div></div>';
                        echo '</a>';
                      }
                      $e++;
                    }
                    echo '</div>';
                    echo '</div>';
                  } else {
                    echo '<div class="row">';
                    $c = 1;
                    foreach ($posts as $post) {
                      if ($c <= 2) {
                        echo '<div class="blog-tmpl3-item col-sm-12">';
                        echo '<div class="row">';
                        echo '<div class="blog-tmpl3-left col-xs-12 col-sm-6">';
                        echo '<div class="blog-post-thumbnail" style="background-image: url(' . get_the_post_thumbnail_url($post['ID']) . '" title="' . $post['post_title'] . ');"></div>';
                        echo '</div>';
                        echo '<div class="blog-tmpl3-left col-xs-12 col-sm-6">';
                        echo '<h4 class="blog-post-title">' . $post['post_title'] . '</h4>';
                        echo '<p class="blog-post-intro">' . mb_substr(strip_tags($post['post_content']), 0, 150) . '</p>';
                        echo '<p class="blog-post-info">';
                        echo '<span class="date">' . date('F j, Y') . '</span>  ';
                        echo 'by <span class="author">' . get_the_author_meta('first_name', $post['post_author']) . '</span>';
                        echo '</p>';
                        echo '<p class="read_more"><a class="btn btn-readmore" title="'.$post['post_title'].'" target="_blank" href="'.get_permalink($post['ID']).'">Read more</a></p>';
                        echo '</div></div></div>';
                      }
                      $c++;
                    }
                    echo '</div>';
                  }
                  ?>
                </div>
                <?php endforeach; ?>
              </div>
              <div class="col-sm-4 blogs-right-column">
                <div class="banners">
                  <?php
                  $banners = get_field('banners', get_the_ID());
                  foreach ($banners as $banner) {
                    echo '<a href="'.$banner['banner_link'].'" target="_blank">';
                    echo '<img src="'.$banner['banner_img'].'" alt=""></a>';
                  }
                  ?>
                </div>
                <div class="recent-post">
                  <div class="header">
                    <h3 class="cat-title"><?php echo __('Recent Posts', 'Theme texts'); ?></h3>
                  </div>
                  <?php
                  $recent_post = getBlogPosts();
                  foreach ($recent_post as $post) {
                    echo '<a title="'.$post['post_title'].'" target="_blank" href="'.get_permalink($post['ID']).'">';
                    echo '<div class="recent-post-item">';
                    echo '<div class="recent-post-thumbnail" style="background-image: url(' . get_the_post_thumbnail_url($post['ID']) . '" title="' . $post['post_title'] . ');"></div>';
                    echo '<div class="recent-post-detail">';
                    echo '<h4 class="recent-post-title">' . $post['post_title'] . '</h4>';
                    echo '<p class="recent-post-info">';
                    echo '<span class="date">' . date('F j, Y') . '</span>  ';
                    echo 'by <span class="author">' . get_the_author_meta('first_name', $post['post_author']) . '</span>';
                    echo '</p>';
                    echo '</div></div>';
                    echo '</a>';
                  }
                  ?>
                </div>
                <div class="cat_listed">
                  <div class="header">
                    <h3 class="cat-title"><?php echo __('Categories', 'Theme texts'); ?></h3>
                  </div>
                  <ul>
                    <li><a target="_blank" href="<?php echo get_home_url(); ?>/category/blog" title="Blogs">All Categories</a></li>
                    <?php
                    $args = array('parent' => $cat_blog->term_id);
                    $categories = get_categories( $args );
                    foreach ($categories as $cat) {
                      echo '<li><a target="_blank" href="'.get_home_url().'/category/blog/'.$cat->slug.'" title="'.$cat->name.'">'.$cat->name.'</a></li>';
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>

<?php
  function getBlogPosts($tag_id='') {
    if ($tag_id) {
      $args = array(
        'post_type'              => array( 'blog' ),
        'nopaging'               => false,
        'posts_per_page'         => '4',
        'orderby'                => 'date',
        'post_status'            => 'publish',
        'tax_query' => array(
          array(
            'taxonomy'  => 'category',
            'terms'     => $tag_id,
            'field'     => 'term_id',
          )
        ),
      );
    } else {
      $args = array(
        'post_type'              => array( 'blog' ),
        'nopaging'               => false,
        'posts_per_page'         => '5',
        'orderby'                => 'date',
        'post_status'            => 'publish',
      );
    }

    $post_query = new WP_Query( $args );

    $data = array_map(
      function( $post ) {
        return (array) $post;
      },
      $post_query->posts
    );

    wp_reset_postdata();

    return $data;
  }
?>

<?php
get_sidebar();
get_footer();
