<section class="steps">
    <div class="container">
        <?php if (get_field( 'title' )) { ?>
            <div class="section-title">
                <h2><?php the_field( 'title' ); ?></h2>
            </div>
        <?php } ?>

        <?php if ( have_rows( 'step_items' ) ) : ?>
            <div class="steps__container">
                <?php while ( have_rows( 'step_items' ) ) : the_row(); ?>
                    <article class="steps__item">
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php $size = '169_135'; ?>
                        <?php $attr = array('width' => '169', 'height' => '135'); ?>
                        <?php if ( $image ) : ?>
                            <div class="steps__item-ico">
                                <?php echo wp_get_attachment_image($image, $size, false, $attr); ?>
                            </div>
                        <?php endif; ?>

                        <div class="steps__item-text">
                            <?php if (get_sub_field( 'title' )) { ?>
                                <div class="steps__item-title">
                                    <h3><?php the_sub_field( 'title' ); ?></h3>
                                </div>
                            <?php } ?>

                            <?php the_sub_field( 'description' ); ?>
                        </div>
                        <div class="steps__item-num"></div>
                        <div class="steps__item-steps-side">
                            <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/static/app/img/steps-side.svg" alt="" role="presentation">
                        </div>
                        <div class="steps__item-steps-bottom">
                            <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/static/app/img/steps-bottom.svg" alt="" role="presentation">
                        </div>
                        <div class="steps__item-steps-mobile">
                            <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/static/app/img/steps-mobile.svg" alt="" role="presentation">
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>