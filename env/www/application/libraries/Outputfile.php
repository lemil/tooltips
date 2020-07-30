<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outputfile {


	public function csv($filename,$rows) {
		$doheader = TRUE;

		$out = '';

		if($rows == NULL) {
		} else {
			foreach( $rows as $row ) { 
				if($doheader){
					$doheader = FALSE;
					//ROW
					foreach ($row as $cell => $value) { 
						$out .= '' . $cell . ';';
					} 
					$out .= "\n";
				}
				foreach ($row as $cell => $value) {
				   $type = '';
				   if(is_numeric($value)){
						$type = '';
					}
					$value = trim(preg_replace('/\s+/', ' ', $value));
					$out .= $type .  $value . $type . ';';
				}
				$out .= "\n";
			}
		}

		return $this->to_file($filename,$out);
	}

	public function to_file($filename,$out) {
		 // the following lines write the contents to a file in the same directory (provided permissions etc)
        $fp = fopen($filename, 'w');
        fwrite($fp, $out);
        fclose($fp);
        return 1;
	}

}
?>