<?php

namespace Wordpress\Themes\Tradesman;

class Utility {

	public static function proper_possessive( $word )
	{
		return $word[strlen($word)-1] == 's' ? $word . "'" : $word . "'s";
	}
}