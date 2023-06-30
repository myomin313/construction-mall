<?php

namespace App\Helper;

class AndCharacterChanger{		
	public static function replaceChar($string){
		$char   = 'and_char';
        if (strpos($string, $char) !== false) {
            $string = str_replace($char,"&",$string);
        }
        return $string;
	}
}
?>