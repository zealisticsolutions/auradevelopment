<?php
/**
 *
 * Build pagination numbers
 * @param $records - total records
 * @param $per_page - per page records
 * @param $current - current page
 * @param $delta - number of pages to show in the middle
 * @param $first_last - number of pages to show at the bigining and at the end
 * @return array
 */
function buildPageNumbers($records, $per_page, $current, $delta, $first_last) {

	$total = ceil($records / $per_page);
	
	$current = ($current > $total) ? $total : $current;
	$current = ($current < 1) ? 1 : $current;

	for ($i=1; $i <= $total; $i++) {
		if (($i == $first_last+1 && $current > $first_last+$delta+1) || ($i == $total-$first_last and $current < $total-$first_last-$delta)) {
			$pages[] = "...";
		}
		if ($i <= $first_last || $i > $total-$first_last) {
			$pages[] = $i;
		} elseif ($i >= $current-$delta and $i <= $current+$delta) {
			$pages[] = $i;
		}

	}
	
	return $pages;
}
/**
 *
 * Render pagination
 * @param $pages - pages array. Get it from buildPageNumbers
 * @param $current - current page
 * @param $url - links location URL
 * @param $urlParams - params that are need to be passed in the URL
 * @return string
 */
function renderPagination($pages, $current, $url, $urlParams = array()) {
	$pagination = '';
	$params = array();
	
	foreach ($urlParams as $key => $val)
	{
		if (!in_array($key, array('page')))
		{
			$params[] = $key . '=' . $val;
		}
	}
	
	$sep1 = strpos($url, '?') === false ? '?' : '&amp;';
	$sep2 = count($params) > 0 ? '&amp;' : NULL;
	$params = join('&amp;', $params);
	
	if ($pages)
	{
		foreach ($pages as $key => $value) 
		{
			if ($value == $current) 
			{
				$pagination .= '<li><span class="current">'.$value.'</span></li>';
			} elseif ($value>0) {				
				$pagination .= '<li><a href="'.$url.$sep1.$params.$sep2.'page='.$value.'" class="focus" title="Go to page '.$value.'">'.$value.'</a></li>';
			} else {
				$pagination .= '<li><span class="dots">'.$value.'</span></li>';
			}
		}
	}
	
	return $pagination;
}
?>