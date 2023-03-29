<?php
/* Template name: Club */

get_header();
$highlight_items = get_field('highlight_items', get_the_ID());
?>

  <div id="club">
    <section id="hero-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
    </section>

    <div class="sec-topicbar">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="topicbar-left">
              ASSETWISE <span>CLUB</span>
            </div>
            <div class="topicbar-right hidden-xs">
              <img src="<?php echo get_template_directory_uri(); ?>/images/club/infobar-logo.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="blogs-content">
			<?php
			$news = new WP_Query( array(
				'post_type'     => 'news_activities',
				'showposts'     => 6,
				'category_name' => 'news',
				'order'         => 'DESC',
			) );

			$activities = new WP_Query( array(
				'post_type'     => 'news_activities',
				'showposts'     => 6,
				'category_name' => 'activities',
				'order'         => 'DESC',
			) );

			$activities_m = new WP_Query( array(
				'post_type'     => 'news_activities',
				'showposts'     => - 1,
				'category_name' => 'activities',
				'order'         => 'DESC',
			) );

			$privileges = new WP_Query( array(
				'post_type' => 'privileges',
				'showposts' => 6,
				'order'     => 'DESC',
			) );

      $privileges_m = new WP_Query( array(
        'post_type' => 'privileges',
        'showposts' => - 1,
        'order'     => 'DESC',
      ) );
			?>

      <div id="container">

        <section id="highlight">
          <div class="container">
            <h2 class="highlight-title">
              ไฮไลท์
            </h2>
            <div class="highlight-wrapper row">
              <?php foreach ( $highlight_items as $item ) : ?>
                <div class="hilight-item item col-sm-4">
                  <a href="<?php the_permalink( $item->ID ); ?>" title="<?php echo $item->post_title; ?>">
                    <div class="inner">
                      <div class="thumb"
                           style="background-image: url('<?php echo get_the_post_thumbnail_url( $item->ID ); ?>');"></div>
                      <div class="intro">
                        <span class="category">
                          <?php $category = get_the_category( $item->ID );
                          echo $category[0]->name; ?>
                        </span>
                        <h3 class="title">
                          <?php echo $item->post_title; ?>
                        </h3>
                        <p class="date">
                          <?php echo get_the_date( 'j F Y', $item->ID ); ?>
                        </p>
                        <div class="line"></div>
                        <p>
                          <?php echo mb_substr( strip_tags( $item->post_content ), 0, 172, 'UTF-8' ); ?>...
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>

        <div class="container">
          <div class="news-privileges-tab-wrapper">
            <ul class="nav nav-pills">
              <li class="active">
                <a href="#news" class="club-nav news" data-toggle="pill" title="News">
                  <span>News</span>
                </a>
              </li>
              <li>
                <a href="#activities" class="club-nav activities" data-toggle="pill" title="Activities">
                  <span>Activities</span>
                </a>
              </li>
              <li>
                <a href="#privileges" class="club-nav privileges" data-toggle="pill" title="Privileges">
                  <span>Privileges</span>
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="news" class="tab-pane row in active fade ">
                <div class="news-wrapper desktop hidden-xs">
                  <?php while ( $news->have_posts() ) : $news->the_post(); ?>
                    <div class="news-activities-item item col-sm-4">
                      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
                        <div class="inner">
                          <div class="thumb"
                               style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                          <div class="intro">
                                <span class="category">
                                  <?php $category = get_the_category();
                                  echo $category[0]->name; ?>
                                </span>
                            <h3 class="title">
                              <?php the_title(); ?>
                            </h3>
                            <p class="date">
                              <?php echo get_the_date(); ?>
                            </p>
                            <div class="line"></div>
                            <p>
                              <?php echo mb_substr( strip_tags( get_the_content() ), 0, 172, 'UTF-8' ); ?>...
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="news-wrapper mob visible-xs">
                  <?php while ( $news->have_posts() ) : $news->the_post(); ?>
                    <div class="news-activities-item item col-sm-4">
                      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
                        <div class="inner">
                          <div class="thumb"
                               style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                          <div class="intro">
                                <span class="category">
                                  <?php $category = get_the_category();
                                  echo $category[0]->name; ?>
                                </span>
                            <h3 class="title">
                              <?php the_title(); ?>
                            </h3>
                            <p class="date">
                              <?php echo get_the_date(); ?>
                            </p>
                            <div class="line"></div>
                            <p>
                              <?php echo mb_substr( strip_tags( get_the_content() ), 0, 172, 'UTF-8' ); ?>...
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="load-more-btn-wrapper hidden-xs">
                  <button id="loadMore_news" class="btn loadmore-item text-center" data-offset="6"
                          data-post-type="news_activities" data-cat="news" data-container="news-wrapper">Load More
                  </button>
                </div>
              </div>

              <div id="activities" class="tab-pane row fade" data-show="6">
                <div class="activity-wrapper desktop hidden-xs">
                  <?php while ( $activities->have_posts() ) : $activities->the_post(); ?>
                    <div class="news-activities-item item col-sm-4">
                      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
                        <div class="inner">
                          <div class="thumb"
                               style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                          <div class="intro">
                            <span class="category">
                                <?php $category = get_the_category();
                                echo $category[0]->name; ?>
                            </span>
                            <h3 class="title">
                              <?php the_title(); ?>
                            </h3>
                            <p class="date">
                              <?php echo get_the_date(); ?>
                            </p>
                            <div class="line"></div>
                            <p>
                              <?php echo mb_substr( strip_tags( get_the_content() ), 0, 172, 'UTF-8' ); ?>...
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="activity-wrapper mob visible-xs">
                  <?php while ( $activities_m->have_posts() ) : $activities_m->the_post(); ?>
                    <div class="news-activities-item item col-sm-4">
                      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
                        <div class="inner">
                          <div class="thumb"
                               style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                          <div class="intro">
                                <span class="category">
                                    <?php $category = get_the_category();
                                    echo $category[0]->name; ?>
                                </span>
                            <h3 class="title">
                              <?php the_title(); ?>
                            </h3>
                            <p class="date">
                              <?php echo get_the_date(); ?>
                            </p>
                            <div class="line"></div>
                            <p>
                              <?php echo mb_substr( strip_tags( get_the_content() ), 0, 172, 'UTF-8' ); ?>...
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="load-more-btn-wrapper hidden-xs">
                  <button id="loadMore_activity" class="btn loadmore-item text-center" data-offset="6"
                          data-post-type="news_activities" data-cat="activities" data-container="activity-wrapper">Load More</button>
                </div>
              </div>

              <div id="privileges" class="tab-pane row fade" data-show="6">
                <div class="privileges-wrapper desktop hidden-xs">
                  <?php while ( $privileges->have_posts() ) : $privileges->the_post(); ?>
                    <div class="privileges-item item col-sm-4">
                      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
                        <div class="inner">
                          <div class="thumb"
                               style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                          <div class="intro">
                                <span class="category">
                                    <?php
                                      $category = get_the_category();
                                      echo $category[0]->name != '' ? $category[0]->name:'Privilege'; ?>
                                </span>
                            <h3 class="title">
                              <?php the_title(); ?>
                            </h3>
                            <p class="date">
                              <?php echo get_the_date(); ?>
                            </p>
                            <div class="line"></div>
                            <p>
                              <?php echo mb_substr( strip_tags( get_the_content() ), 0, 172, 'UTF-8' ); ?>...
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="privileges-wrapper mob visible-xs">
                  <?php while ( $privileges->have_posts() ) : $privileges->the_post(); ?>
                    <div class="privileges-item item col-sm-4">
                      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
                        <div class="inner">
                          <div class="thumb"
                               style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                          <div class="intro">
                            <span class="category">
                                <?php $category = get_the_category();
                                echo $category[0]->name; ?>
                            </span>
                            <h3 class="title">
                              <?php the_title(); ?>
                            </h3>
                            <p class="date">
                              <?php echo get_the_date(); ?>
                            </p>
                            <div class="line"></div>
                            <p>
                              <?php echo mb_substr( strip_tags( get_the_content() ), 0, 172, 'UTF-8' ); ?>...
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="load-more-btn-wrapper hidden-xs">
                  <button id="loadMore_privileges" class="btn loadmore-item text-center"
                          data-offset="6" data-post-type="privileges" data-container="privileges-wrapper">
                    Load More
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>

<?php
get_sidebar();
get_footer();
