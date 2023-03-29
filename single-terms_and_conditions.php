<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AssetWise
 */

get_header(); ?>
  <style>
    #single-terms-and-conditions {
        padding-top: 3em;
        padding-bottom: 3em;
    }
    .wp-block-table table {
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }
    .wp-block-table table>tbody>tr>td, .wp-block-table table>tbody>tr>th,
    .wp-block-table table>tfoot>tr>td, .wp-block-table table>tfoot>tr>th,
    .wp-block-table table>thead>tr>td, .wp-block-table table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border: 1px solid #999;
    }
  </style>
	<div id="single-terms-and-conditions" class="container">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
