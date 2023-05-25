<?php
$tbHead= get_field('tbHead');


echo acf_block_before( 'Table', $is_preview );
?>

  <section itemscope itemtype="https://schema.org/Table" id="system" class="app-specification">
      <table  class="app-table">
        <thead>
        <tr>
          <th itemprop="about" colspan="2"><?=$tbHead?></th>
        </tr>
        </thead>
      </table>
      <table   class="app-table">
        <tbody>
        <?php if( have_rows('tbBody') ): ?>
            <?php while( have_rows('tbBody') ): the_row();
              $tbKey = get_sub_field('tbKey');
              $tbValue = get_sub_field('tbValue');
              ?>
              <tr >
                <td><?=$tbKey?></td>
                <td><?=$tbValue?></td>
              </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
      </table>
  </section>


<?php
echo acf_block_after( $is_preview );