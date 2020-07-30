<?php error_reporting(0);
//header("Content-type: text/csv");
//header("Content-Disposition: attachment; filename=".$filename.".csv");
header("Content-type: text/text");
header("Content-Disposition: attachment; filename=".$filename.".txt");
header("Pragma: no-cache");
header("Expires: 0");

	$doheader = TRUE;

	if($rows == NULL) {
	} else {
		foreach( $rows as $row ) { 
			if($doheader){
				$doheader = FALSE;
				//ROW
				foreach ($row as $cell => $value) { 
					echo '' . $cell . ';';
				} 
				echo "\n";
			}
			foreach ($row as $cell => $value) {
			   $type = '';
			   if(is_numeric($value)){
					$type = '';
				}
				$value = trim(preg_replace('/\s+/', ' ', $value));
				echo $type .  $value . $type . ';';
			}
			echo "\n";
		}
	}
	
 ?>