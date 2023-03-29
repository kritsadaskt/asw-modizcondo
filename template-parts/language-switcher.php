<?php define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true); ?>
<?php $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str'); ?>
<?php if(count($languages) > 1) : ?>
  <?php
    $current_lang_flag = '';
    $current_lang_code = '';
    foreach ($languages as $language) {
      if($language['active'] === '1') {
        $current_lang_flag = $language['country_flag_url'];
        $current_lang_code = $language['language_code'];
      }
    }
  ?>
  <div class="lang-selector btn-group hidden-xs">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="<?php echo $current_lang_flag; ?>" alt="<?php echo $current_lang_code; ?>"> <span class="caret"></span>
    </button>
    <ul class="lang-list dropdown-menu">
      <?php foreach(array_reverse($languages) as $language) : ?>
      <li class="lang-item">
        <a title="<?php echo $language['language_code']; ?>" class="lang <?php echo $language['language_code']; ?> <?php echo $language['active'] == 1 ? 'active' : ''; ?>"
           href="<?php echo $language['url']; ?>">
          <img src="<?php echo $language['country_flag_url']; ?>" alt="<?php echo $language['language_code']; ?><">
          <span><?php echo $language['native_name']; ?></span></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="lang-selector visible-xs">
    <ul class="lang-list">
      <?php foreach(array_reverse($languages) as $language) : ?>
        <li class="lang-item">
          <a title="<?php echo $language['language_code']; ?>" class="lang <?php echo $language['active'] == 1 ? 'active' : ''; ?>"
             href="<?php echo $language['url']; ?>">
            <img src="<?php echo $language['country_flag_url']; ?>" alt="<?php echo $language['language_code']; ?><">
            <span><?php echo $language['language_code']; ?></span></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
