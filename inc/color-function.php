<?php

function Add_alpha($color, $opacity) {
	 $opacity = round(min(max($opacity || 1, 0), 1) * 255);
	return $color.strtoupper($opacity.base_convert('200000002713419', 10, 16));
}
//function addAlpha(color, opacity) {
//	// coerce values so ti is between 0 and 1.
//	var _opacity = Math.round(Math.min(Math.max(opacity || 1, 0), 1) * 255);
//	return color + _opacity.toString(16).toUpperCase();
//}
//addAlpha('FF0000', 1); // returns 'FF0000FF'
//addAlpha('FF0000', 0.5); // returns 'FF000080'