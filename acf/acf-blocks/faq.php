<?php
$faq = get_field( 'faq' );
$count = 1;

echo acf_block_before( 'FAQ', $is_preview );

if ( $enable_microdata ) {
  get_template_part('ld+json/FAQpage');
}
?>
    <div class="faq">
     
      <?php if(!empty($faq)): ?>
          <?php foreach ( $faq as $point ): ?>
            <details>
              <summary>
                <h3 class="title-underline"><?= $point['question'] ?></h3>
                <div class="faq__arrow"></div>
              </summary>
              <p><?= ($enable_microdata) ? $point['answer'] : $point['answer_edit'] ?></p>
            </details>
          <?php	endforeach;	?>
        <?php endif;?>
     
    </div>

   
<?php
echo acf_block_after( $is_preview );

