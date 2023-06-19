<?php
$faq = get_field( 'faq' );
$count = 1;
$enable_microdata = get_field('enable_microdata');

echo acf_block_before( 'FAQ', $is_preview );

if ( $enable_microdata ) {
  get_template_part('ld+json/FAQpage');
}
?>
    <div class="faq">

      <?php if(!empty($faq)): ?>
          <?php foreach ( $faq as $point ): ?>
            <?php 
              if ( $enable_microdata ) {


                echo "start";
                $answerFilter = wp_strip_all_tags($point['answer']);
                echo '</br>';
                var_dump($answerFilter);
                echo '</br>';
                $answerFilter = str_replace('#8217',' ', $answerFilter);
                echo '</br>';
                
            
                var_dump($answerFilter);
                
              } ?>
            <details>
              <summary>
                <h3 class="title-underline"><?= $point['question'] ?></h3>
                <div class="faq__arrow"></div>
              </summary>
              <p><?php echo ($enable_microdata) ? $answerFilter  : $point['answer'] ?></p> 
            </details>
          <?php	endforeach;	?>
        <?php endif;?>
     
    </div>

   
<?php
echo acf_block_after( $is_preview );

