<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AssetWise
 */

$p = get_the_ID();

?>

<article id="privilege-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php assetwise_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
        <small class="category">
            <a href="<?php echo get_site_url(); ?>/assetwise-club/">AssetWise Club > <span class="cat-name"><?php echo get_post_type(); ?></span></a>
        </small>
	</header><!-- .entry-header -->

  <?php if(get_the_post_thumbnail()) : ?>
      <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
          </div>
      </div>
  <?php endif; ?>

  <!--
  <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
          <p class="published-date">
              Published on <span class="date"><?php //the_date(); ?></span>
          </p>
      </div>
  </div>
  -->

	<div class="entry-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
		        <?php
                    the_content( sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'assetwise' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'assetwise' ),
                        'after'  => '</div>',
                    ) );
                ?>
                <?php if(acf_photo_gallery('gallery', $p)) : ?>
                    <div class="gallery-container">
                        <?php
                            $images = acf_photo_gallery('gallery', $p);
                            foreach ($images as $image) {
	                            echo "<div class='col-sm-3 col-xs-6'>";
                                echo "<a class='gallery-item' href='" . $image['full_image_url'] ."' data-lightbox='gallery-img'>";
                                echo "<div class='gallery-item-inner' style='background:url(\"" . $image['full_image_url'] ."\");'>";
                                echo "</div></a></div>";
                            }
                        ?>
                    </div>
                <?php endif; ?>
                </div>
                <div class="social-container pull-right">
                    <a class="share-twitter"
                       target="_blank"
                       href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">
                        <i class="fa fa-twitter-square"></i>
                    </a>
                    <a class="share-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                    <div class="line-it-button" data-lang="en" data-type="share-d" data-url="<?php the_permalink(); ?>" style="display: none;"></div>
                    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
		        <?php assetwise_entry_footer(); ?>
            </div>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
