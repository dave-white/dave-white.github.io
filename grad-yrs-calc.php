<?php
$yr_dur_ord = date_diff(date_create('2017-08-01'), new DateTime())->y + 1;
$yr_dur_suffix = 'th';
if ($yr_dur_ord == 1) {
  $yr_dur_suffix = 'st';
} elseif ($yr_dur_ord == 2) {
  $yr_dur_suffix = 'nd';
}
$str_yr_dur_ord = sprintf('%d'.$yr_dur_suffix, $yr_dur_ord);
?>
