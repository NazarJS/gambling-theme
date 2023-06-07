<?php
$faq = get_field( 'faq' );

$entity_arr = [];

foreach ( $faq as $item ) {
	$question    =  wp_strip_all_tags(str_replace( '"', '`', $item['question'] ),true);
	$answer      =  wp_strip_all_tags(str_replace( '"', '`', $item['answer'] ),true);
	$entity_item = "
        {
            \"@type\": \"Question\",
            \"name\": \"{$question}\",
            \"acceptedAnswer\": {
                \"@type\": \"Answer\",
                \"text\": \"{$answer}\"
            }
        }
        ";
	array_push( $entity_arr, $entity_item );
}


?>
<?php if(!empty($faq)):?>
<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                <?= implode(',', $entity_arr) ?>
            ]
        }
</script>
<?php endif;