<?php
/*
Template Name: ASW Condominium Full-Width
Template Post Type: condominium, house
*/
$url = get_permalink();
$id = get_the_ID();
get_header();
//echo get_field('header_code', get_the_ID());
?>
<div id="primary" class="content-area condo <? echo $page_url; ?>">
<div id="loader">
  <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<?php echo get_field('body_code', get_the_ID()); ?>
<?php the_content(); ?>
</div>
<?php
get_sidebar();
get_footer();