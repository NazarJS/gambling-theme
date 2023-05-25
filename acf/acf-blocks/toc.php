<?php echo acf_block_before( 'TOC', $is_preview ); ?>

<div class="list">
    <div class="list__header">
        <button class="list__button">
            <i class="table-icon"></i> Content
        </button>
    </div>
    <div class="list__content">
		<?php echo '{{TOC}}'; ?>
    </div>
</div>


<?php echo acf_block_after( $is_preview ); ?>
