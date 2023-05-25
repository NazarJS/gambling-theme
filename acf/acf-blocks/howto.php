<?php
$main_title       = get_field( 'main_title' );
//$description      = get_field( 'description' );
$main_image       = get_field( 'main_image' );
$steps            = get_field( 'steps' );
$enable_microdata = get_field( 'enable_microdata' ) ?? false;

echo acf_block_before( 'HowTo', $is_preview );
if ( $enable_microdata ):?>
	<?= get_template_part( 'ld+json/How-to' ) ?>
<?php endif; ?>
    

   <div>
   <div class="container">
        <div class="manual" >
            <div class="manual__title">
            <?php if ( ! empty( $main_title ) ): ?>
                <h2><?= $main_title ?></h2>
            <?php endif; ?>
            </div>

            <div class="manual__body">
                <div class="row">
                <?php 
                $count = 1;
                if ( ! empty( $steps ) ):
                    foreach ( $steps as $step ):?>
                    
                        <div class="col-md-6">
                            <div class="manual__item">
                        
                                <h3 class="title-underline"><?= $step['title']. $count++ ?></h3>


                                <?php if ( ! empty( $step['text'] ) ) : ?>
                                    <div class="manual__description"><?= $step['text'] ?></div>
                                <?php endif; ?>


                                <?php if ( ! empty( $step['image'] ) ): ?>
                                        <div class="manual__image">
                                            <?= get_image( $step['image'] ) ?>
                                        </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php
                    endforeach;
                endif; ?>
                </div>  
            </div>
        </div>
    </div>
   </div>
<?php
echo acf_block_after( $is_preview );