<?php
class Utils {
	public static function getPrice($strPrice) {
		preg_match_all('/[\d\.]*/', $strPrice, $matches);
		foreach($matches[0] as $price) {
			if(!empty($price)) return $price;
		}	
	}
}