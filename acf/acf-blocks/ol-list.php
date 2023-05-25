<?php
$olStyle= get_field('olStyle');
$olItems= get_field('olItems');




echo acf_block_before( 'Ordered list', $is_preview );
?>
<?php if( have_rows('olItems') ): ?>
  <ol class="ol-bigger">
    <?php while( have_rows('olItems') ): the_row();
      $olItem = get_sub_field('olItem');
      ?>
      <li>
       <div>
         <?=$olItem?>
       </div>
      </li>
    <?php endwhile; ?>
  </ol>
<?php endif; ?>




<?php
echo acf_block_after( $is_preview );