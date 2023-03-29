<?php
$page_ident = get_field('page_identities', get_the_ID());
$register_section = get_field('register_section', get_the_ID());
?>
<style type="text/css">
  <?php if ($page_ident['main_color']) : ?>
  #register_section .register-headline-text .headline,
  #register_section .register-headline-text .headline strong {
      color: <?=$page_ident['main_color'];?>;
      font-weight: 500;
  }
  #top_menu .navbar ul.nav li.active {
      border-bottom-color: <?=$page_ident['main_color'];?>;
  }
  #register_section .register-headline-text .headline {
      border-left: 5px solid <?=$page_ident['main_color'];?>;
  }
  #register_section .register-box-wrapper #register_box .wpcf7-submit {
      background-color: <?=$page_ident['main_color'];?>;
  }
  <?php endif; ?>
</style>
<div id="loader">
  <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<div class="pre-register-box"></div>
<div id="register_section">
  <div class="container">
    <div class="row">
      <div class="register-headline-text col-sm-5">
        <h3 class="headline">
          <?=$register_section['headline_1'];?>
        </h3>
        <p class="sub-headline">
          <?=$register_section['headline_2'];?>
        </p>
      </div>
      <div class="register-box-wrapper col-sm-7 col-sm-offset-0 col-md-6 col-md-offset-1">
        <div id="register_box">
          <img class="hidden-xs" src="<?=get_template_directory_uri() . '/images/condominium/modiz-rhyme/form-top.png';?>" alt="">
          <?=do_shortcode($register_section['form_shortcode']);?>
          <?php if ($register_section['form_footer_image']) : ?>
          <img class="form-bottom hidden-xs" src="<?=$register_section['form_footer_image'];?>" alt="">
          <?php else: ?>
          <img class="form-bottom hidden-xs" src="<?=get_template_directory_uri() . '/images/condominium/modiz-rhyme/form-bottom.png';?>" alt="">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="post-register-box"></div>
