<?php
$faq = get_field( 'faq' );
// $enable_microdata = get_field( 'enable_microdata' ) ?? false;
$count = 1;
//s$close_faq = get_field('close_faq') ?? false;

echo acf_block_before( 'FAQ', $is_preview );

if ( $enable_microdata ) {
  get_template_part('ld+json/FAQpage');
}
?>
    <div class="faq">
     <div class="container">
      <?php if(!empty($faq)): ?>
          <?php foreach ( $faq as $point ): ?>
            <details>
              <summary>
                <h2 class="title-underline"><?= $point['question'] ?></h2>
                <div class="faq__arrow"></div>
              </summary>
              <p><?= ($enable_microdata) ? $point['answer'] : $point['answer_edit'] ?></p>
            </details>
          <?php	endforeach;	?>
        <?php endif;?>
     </div>
    </div>

   
<?php
echo acf_block_after( $is_preview );

