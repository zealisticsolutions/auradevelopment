<?php
/**
 *
 * @param $d int
 * @param $name string
 * @param $id string
 * @param $class string
 * @param $empty false|array (Array indexes: value, title)
 * @return void
 */
function dayWidget($d = null, $name = 'day', $id = 'day', $class = 'select-mini', $empty = false)
{
	?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>"><?php
	if ($empty !== false && is_array($empty))
	{
		?><option value="<?php echo $empty['value']; ?>"><?php echo stripslashes($empty['title']); ?></option><?php
	}
	foreach (range(1, 31) as $v)
	{
		if (strlen($v) == 1)
		{
			$v = '0' . $v;
		}
		
		if (!is_null($d) && $v == $d)
		{
			?><option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option><?php
		} else {
			?><option value="<?php echo $v; ?>"><?php echo $v; ?></option><?php
		}
	}
	?></select><?php
}

function monthWidget($m = null, $format = null, $name = 'month', $id = 'month', $class = 'select-mini', $empty = false)
{
	?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>"><?php
	if ($empty !== false && is_array($empty))
	{
		?><option value="<?php echo $empty['value']; ?>"><?php echo stripslashes($empty['title']); ?></option><?php
	}
	if (!is_null($format) && in_array($format, array('F', 'm', 'M', 'n')))
	{

	} else {
		$format = "m";
	}
	
	foreach (range(1, 12) as $v)
	{
		if (strlen($v) == 1)
		{
			$v = '0' . $v;
		}
		
		if (!is_null($m) && $v == $m)
		{
			?><option value="<?php echo $v; ?>" selected="selected"><?php echo date($format, mktime(0, 0, 0, $v, 1, 2000)); ?></option><?php
		} else {
			?><option value="<?php echo $v; ?>"><?php echo date($format, mktime(0, 0, 0, $v, 1, 2000)); ?></option><?php
		}
	}
	?></select><?php
}

function yearWidget($y = null, $left = null, $right = null, $name = 'year', $id = 'year', $class = 'select-mini', $empty = false)
{
	?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>"><?php
	if ($empty !== false && is_array($empty))
	{
		?><option value="<?php echo $empty['value']; ?>"><?php echo stripslashes($empty['title']); ?></option><?php
	}
	$curr_year = date("Y");
		
	foreach (range($curr_year - (int) $left, $curr_year + 1 + (int) $right) as $v)
	{
		if (!is_null($y) && $v == $y)
		{
			?><option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option><?php
		} else {
			?><option value="<?php echo $v; ?>"><?php echo $v; ?></option><?php
		}
	}
	?></select><?php
}

function hourWidget($h = null, $name = 'hour', $id = 'hour', $class = 'select-mini')
{
	?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>"><?php
	foreach (range(0, 23) as $v)
	{
		if (strlen($v) == 1)
		{
			$v = '0' . $v;
		}
		
		if (!is_null($h) && $v == $h)
		{
			?><option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option><?php
		} else {
			?><option value="<?php echo $v; ?>"><?php echo $v; ?></option><?php
		}
	}
	?></select><?php
}

function minuteWidget($m = null, $name = 'minute', $id = 'minute', $class = 'select-mini')
{
	?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>"><?php
	foreach (range(0, 59) as $v)
	{
		if (strlen($v) == 1)
		{
			$v = '0' . $v;
		}
		
		if (!is_null($m) && $v == $m)
		{
			?><option value="<?php echo $v; ?>" selected="selected"><?php echo $v; ?></option><?php
		} else {
			?><option value="<?php echo $v; ?>"><?php echo $v; ?></option><?php
		}
	}
	?></select><?php
}
?>