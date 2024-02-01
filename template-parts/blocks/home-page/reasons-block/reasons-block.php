<section class="reasons">
    <div class="container">
        <div class="reasons__container">
            <?php if (get_field( 'subtitle' )) { ?>
                <div class="section-subtitle">
                    <span><?php the_field( 'subtitle' ); ?></span>
                </div>
            <?php } ?>

            <?php if (get_field( 'title' )) { ?>
                <div class="reasons__title">
                    <h1><?php the_field( 'title' ); ?></h1>
                </div>
            <?php } ?>

            <?php if (get_field( 'description' )) { ?>
                <div class="reasons__text">
                    <?php the_field( 'description' ); ?>
                </div>
            <?php } ?>

            <?php if ( have_rows( 'reasons_items' ) ) : ?>
                <ul class="reasons__list">
                    <?php while ( have_rows( 'reasons_items' ) ) : the_row(); ?>
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $image ) : ?>
                            <li>
                                <?php echo wp_get_attachment_image( $image, $size ); ?>
                                <?php the_sub_field( 'desc' ); ?>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>