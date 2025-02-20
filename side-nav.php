<div id="sideNav" class="sidenav" popover style="align: left;">
  <ul>
		<!--<li><a href="fr/accueil"><button>Version fran&ccedil;aise</button></a></li>-->
  <?php
$pg_array = array(
'index' => array('Home', 'index.html'),
'cv' => array('<i>CV</i>', 'store/cv.pdf'),
'math' => array('Math', 'math.html'),
'tech' => array('Tech', 'tech.html'),
/*'teaching' => array('Teaching', 'teaching.html'),
		'resources' => array('Resources', 'resources.html'),*/
);
  
  foreach ($pg_array as $pg_id => $pg_info):
    if ($page == $pg_id):
  ?>
      <li class="curr"><?php echo $pg_info[0]; ?></li>
  <?php
    else:
  ?>
      <a href="<?php echo $pg_info[1]; ?>"><li class="ncurr"><?php echo $pg_info[0]; ?></li></a>
      <!-- for text browsers -->
      <a hidden href="<?php echo $pg_info[1]; ?>">&lt; go</a>
  <?php endif;
    endforeach;
  ?>
  </ul>
</div>
