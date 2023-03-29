<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AssetWise
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section id="top-slider">
	            <?php echo do_shortcode("[metaslider id=12]"); ?>
            </section>

            <section id="body-content" class="container">

                <h2 class="title text-center">
                    โครงการคุณภาพ จาก AssetWise
                </h2>

                <!-- Tab Nav -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#new-project" data-toggle="tab" role="tab">
                            <img class="project-select" src="<?php echo get_template_directory_uri() ?>/images/project-select-1.png" alt="โครงการใหม่">
                            <span>โครงการใหม่</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ready-to-movein" data-toggle="tab" role="tab">
                            <img class="project-select" src="<?php echo get_template_directory_uri() ?>/images/project-select-2.png" alt="โครงการพร้อมอยู่">
                            <span>โครงการพร้อมอยู่</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#all-project" data-toggle="tab" role="tab">
                        <img class="project-select" src="<?php echo get_template_directory_uri() ?>/images/project-select-3.png" alt="โครงการทั้งหมด">
                        <span>โครงการทั้งหมด</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <div id="new-project" class="tab-pane fade show in active" role="tabpanel">
                        <div class="row">
                            <?php
                                query_posts(array(
                                    'post_type' => array('condominium', 'home'),
                                    'showposts' => -1,
                                    'order' => 'ASC',
                                    'tag' => 'new-project'
                                ) );
                            ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="project col-sm-4">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                                        <?php
                                            if(the_post_thumbnail()){
                                                echo "<img src='" . the_post_thumbnail() ."' alt='" . the_title() . "'>";
                                            }
                                        ?>
                                        <h4>
                                            <?php the_field('project_name'); ?>
                                            <span class="location"><?php the_field('location'); ?></span>
                                        </h4>
                                        <p class="project-desc">
                                            <?php the_field('project_desc'); ?>
                                        </p>
                                        <p class="text-right">
                                            <button class="more-btn">
                                                เพิ่มเติม
                                            </button>
                                        </p>
                                    </a>
                                </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <div id="ready-to-movein" class="fade tab-pane" role="tabpanel">
                        <div class="row">
                            <?php
                            query_posts(array(
                                'post_type' => array('condominium', 'home'),
                                'showposts' => -1,
                                'order' => 'ASC',
                                'tag' => 'ready-to-movein'
                            ) );
                            ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="project col-sm-4">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		                                <?php
		                                if(the_post_thumbnail()){
			                                echo "<img src='" . the_post_thumbnail() ."' alt='" . the_title() . "'>";
		                                }
		                                ?>
                                        <h4>
			                                <?php the_field('project_name'); ?>
                                            <span class="location"><?php the_field('location'); ?></span>
                                        </h4>
                                        <p class="project-desc">
			                                <?php the_field('project_desc'); ?>
                                        </p>
                                        <p class="text-right">
                                            <button class="more-btn">
                                                เพิ่มเติม
                                            </button>
                                        </p>
                                    </a>
                                </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <div id="all-project" class="fade tab-pane" role="tabpanel">
                        <div class="row">
                            <?php
                            query_posts(array(
                                'post_type' => array('condominium', 'home'),
                                'order' => 'ASC',
                                'showposts' => -1
                            ) );
                            ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="project col-sm-4">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		                                <?php
		                                if(the_post_thumbnail()){
			                                echo "<img src='" . the_post_thumbnail() ."' alt='" . the_title() . "'>";
		                                }
		                                ?>
                                        <h4>
			                                <?php the_field('project_name'); ?>
                                            <span class="location"><?php the_field('location'); ?></span>
                                        </h4>
                                        <p class="project-desc">
			                                <?php the_field('project_desc'); ?>
                                        </p>
                                        <p class="text-right">
                                            <button class="more-btn">
                                                เพิ่มเติม
                                            </button>
                                        </p>
                                    </a>
                                </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                </div>

            </section>

            <section id="bottom-banner">
                <div class="container">
	                <?php echo do_shortcode("[metaslider id=17]"); ?>
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
