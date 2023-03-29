<?php
/*
Template Name: ASW Full-Width
Template Post Type: post, page
*/
$url = get_permalink();
$id = get_the_ID();
get_header();
?>
<div id="primary" class="content-area condo">
<?php the_content(); ?>
</div>
<?php
get_sidebar();
get_footer();