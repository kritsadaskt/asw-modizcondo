<?php
$top_menu = get_field('top_menu', get_the_ID());
if ($top_menu) :
?>
<section id="top_menu">
    <nav id="top_bar" class="navbar" role="navigation">
    <ul class="nav navbar-nav">
      <?php foreach ($top_menu as $item) : ?>
      <li>
      <a href="<?=$item['link_to_section'];?>" title="<?=$item['label'];?>"><?=$item['label'];?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </nav>
</section>
<?php endif; ?>