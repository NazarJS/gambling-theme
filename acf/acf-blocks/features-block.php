<?php
echo acf_block_before( 'Pros&Cons', $is_preview );
$first  = get_field( 'first_col' );
$second = get_field( 'second_col' );

?>

    

    <div class="pros-cons">
        <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="pros-cons__item">
              <div class="pros-cons__title">
                <div class="pros-cons__status">

                </div>
                <h2>
                    <?= $first['title'] ?>
                </h2>
              </div>

              <ul class="pros-cons__list">
                <?= $first['content'] ?>
              </ul>
            </div>
          </div>

          
           

            <?php if ( ! empty( $second['content'] ) ): ?>
                <div class="col-md-6">
                    <div class="pros-cons__item pros-cons__item--cons">
                        <div class="pros-cons__title">
                            <div class="pros-cons__status">

                            </div>
                            <h2>
                                <?= $second['title'] ?>
                            </h2>
                        </div>

                        <ul class="pros-cons__list">
                            <?= $second['content'] ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
          </div>
        </div>
        </div>
      </div

    

<?php
echo acf_block_after( $is_preview );