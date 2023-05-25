<?php

function toc_wrapper($content){
	return '<ul>'.$content.'</ul>';
}


function generate_toc_list( $html_string, $depth ) {
	$html_toc='';
	libxml_use_internal_errors( true );
	$dom = new DomDocument;
	$dom->loadHTML( '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />' . $html_string );
	$dom->preserveWhiteSpace = false;

	$pattern = '/<h([2-' . $depth . ']).*?id=["\']([^\'"]+)["\'].*?[^>]*>(.*?)<\/h[2-' . $depth . ']>/';
	$result  = preg_match_all( $pattern, $dom->saveHTML( $dom ), $out );

	foreach ( $out[1] as $key => $value ) {
		$html_toc .="<li  class='toc_heading heading-" . $out[1][ $key ] . "' ><a  href=" . "#" . $out[2][ $key ] . ">" . $out[3][ $key ] . "</a></li>";
	}
	libxml_use_internal_errors( false );
	return $html_toc;
}