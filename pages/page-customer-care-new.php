<?php
/* Template name: Customer Care New */
get_header();
?>
	<div id="loader">
		<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
	</div>

	<div id="customer-care">
		<section id="hero-image">
		</section>
		<div class="container-fluid nopadding sec-topicbar">
			<div class="container nopadding">
				<div class="col-xs-12 text-center">
					<div class="topicbar-left">
						<?php echo __('ASSETWISE <span class="t-grey">Customer Care</span>', 'Theme texts'); ?>
					</div>
					<div class="topicbar-right hidden-xxs">
						<img src="<?php echo get_template_directory_uri() ?>/images/customer-care/infobar-logo.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="cc-form" class="container">
			<?php the_content(); ?>
		</div>
	</div>
<?php
get_sidebar();
get_footer();
