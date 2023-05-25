<?php
$main_title       = get_field( 'main_title' );
$description      = str_replace('"', '`', get_field( 'description' ));
$main_image       = get_field( 'main_image' );
$steps            = get_field( 'steps' );
$steps_counter = 1;
$steps_array   = [];
if(!empty($steps)):
foreach ( $steps as $step ) {
  $step_title = str_replace('"', '`', $step['title']);
  $step_text  = str_replace('"', '`', $step['text']);
  $step_image = wp_get_attachment_image_url( $step['image'], 'full' );
  $step_url   = get_the_permalink() . '#step' . $steps_counter ++;
  $string     = "{
                    \"@type\": \"HowToStep\",
                    \"name\": \"{$step_title}\",
                    \"text\": \"{$step_text}\",
                    \"image\": \"{$step_image}\",
                    \"url\": \"{$step_url}\"
                }";
  array_push( $steps_array, $string );
}
endif;
?>

<script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "HowTo",
            "image": {
                "@type": "ImageObject",
                "url": "<?= !empty($main_image) ? wp_get_attachment_image_url( $main_image, 'full' ) : wp_get_attachment_url(get_field('header_logo', 'options')); ?>"
            },
            "name": "<?= !empty($main_title) ? $main_title : 'How To';  ?>",
            "description": "<?= !empty($description) ? $description : 'How To Steps' ?>",
            "tool": [
            {
                "@type": "HowToTool",
                "name": "Computer"
            },
            {
                "@type": "HowToTool",
                "name": "Mobile phone"
            }
            ],
            "supply": [
            {
                "@type": "HowToSupply",
                "name": "Computer"
            },
            {
                "@type": "HowToSupply",
                "name": "Mobile phone"
            }
            ],
            "totalTime" : "P10M",
            "step": [
                <?= implode( ',', $steps_array ) ?>
            ]
        }
</script>
