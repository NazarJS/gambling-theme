<?php
function get_rating(float $rating): string
{
	if (!$rating){
		return '';
	}
    $star_count = 0;
    $stars = "";
    for ($i = 0; $i < round(round($rating * 2) / 2, 0, PHP_ROUND_HALF_DOWN); $i++) {
        $stars .= ' <svg width="25" height="25" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M9 0L12 6L18 6.75L13.88 11.37L15 18L9 15L3 18L4.13 11.37L0 6.75L6 6L9 0Z" fill="#F2BC00"></path>
             </svg>';
        $star_count++;
    }

	if (round($rating * 2, 0, PHP_ROUND_HALF_UP) % 2 !== 0) {
        $stars .= ' <svg width="25" height="25" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M9 0L6 6L0 6.75L4.13 11.37L3 18L9 15L15 18L13.88 11.37L18 6.75L12 6L9 0ZM9 2.24L11.34 6.93L15.99 7.51L12.81 11.07L13.68 16.22L9 13.88V2.24Z" fill="#F2BC00"></path>
             </svg>';
        $star_count++;
    }
    for ($star_count; $star_count < 5; $star_count++) {
        $stars .= ' <svg width="25" height="25" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M9 0L6 6L0 6.75L4.13 11.37L3 18L9 15L15 18L13.88 11.37L18 6.75L12 6L9 0ZM9 2.24L11.34 6.93L15.99 7.51L12.81 11.07L13.68 16.22L9 13.88L4.32 16.22L5.19 11.07L2.01 7.51L6.66 6.93L9 2.24Z" fill="#F2BC00"></path>
             </svg>';
    }
    return $stars;

}