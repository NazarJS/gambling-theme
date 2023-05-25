<?php
function get_image( $id, $size = 'full' ): string {
  $meta = wp_get_attachment_metadata($id);
  $ret = '<script type="application/ld+json">
          {
            "@context":"http://schema.org/",
            "@type": "ImageObject",
            "contentUrl": "'. wp_get_attachment_url( $id ) .'",
            "width": "'. $meta['width'] .'",
            "height": "'. $meta['height'] .'"
          }
          </script>';
  $ret .= wp_get_attachment_image( $id, $size );

	return $ret;
}