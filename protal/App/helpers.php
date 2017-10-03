<?php

if (!function_exists('env')) {

	function env($key, $default = '') {
		
		if (!getenv($key)) {
			return $default;
		}

		return getenv($key);
	}
}

