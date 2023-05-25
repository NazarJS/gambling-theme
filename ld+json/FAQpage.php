<?php
$faq = get_field( 'faq' );

$entity_arr = [];
foreach ( $faq as $item ) {
  $question = str_replace('"', '`', $item['question']);
  $answer = str_replace('"', '`', $item['answer']);
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
  array_push($entity_arr, $entity_item);
}
?>
<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                <?= implode(',', $entity_arr) ?>
            ]
        }
</script>