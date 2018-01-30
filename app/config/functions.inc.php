<?php
if (!function_exists("redirect"))
{
	function redirect($url, $http_response_code = null, $exit = true)
	{
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
		{
			echo '<html><head><title></title><script type="text/javascript">window.location.href="'.$url.'";</script></head><body></body></html>';
		} else {
			$http_response_code = !is_null($http_response_code) && (int) $http_response_code > 0 ? $http_response_code : 303;
			header("Location: $url", true, $http_response_code);
		}
		if ($exit)
		{
	    	exit();
		}
	}
}