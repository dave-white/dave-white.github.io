<div id="sideNav" class="sidenav">
  <ul>
  <?php
  include $dir.'pg-array.php';
  
  foreach ($pg_array as $pg_id => $pg_name):
    if ($pg_id == $page):
  ?>
      <li class="curr"><?php echo $pg_name; ?></li>
  <?php
    else:
  ?>
      <a href=<?php echo '"'.$pg_id.'"'; ?>><li class="ncurr"><?php echo $pg_name; ?></li></a>
      <!-- for text browsers -->
      <a hidden href=<?php echo '"'.$pg_id.'"'; ?>>&lt; go</a>
  <?php endif;
    endforeach;
  ?>
  </ul>
</div>
