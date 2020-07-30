<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Content-type: application/json; charset=utf-8");

$j = json_encode($d);
$t =  date(DateTime::ISO8601); 

?>{"r" : <?php echo $r; ?>, "t":"<?php echo $t?>","d":<?php echo $j; ?>}