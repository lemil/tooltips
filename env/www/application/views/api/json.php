<?php
header('Content-Type: application/json');
if(!$row) {
	?>{"r":"0","d":"false","t":"<?php echo microtime(true);?>"}<?php 
} 
else 
{
$d = json_encode($row);
?>{"r":"1","d":<?php echo $d ?>,"t":"<?php echo microtime(true);?>"}<?php 
}?>