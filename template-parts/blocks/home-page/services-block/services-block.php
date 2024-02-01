<section class="services" id="services">
    <div class="container">
        <?php if (get_field( 'title' )) { ?>
            <div class="section-title">
                <h2><?php the_field( 'title' ); ?></h2>
            </div>
        <?php } ?>

        <?php if ( have_rows( 'service_items' ) ) : ?>
            <div class="services__container">
                <?php while ( have_rows( 'service_items' ) ) : the_row(); ?>
                    <article class="services__item">
                        <div class="services__item-head">
                            <?php $service_image = get_sub_field( 'service_image' ); ?>
                            <?php $size = '40_40'; ?>
                            <?php if ( $service_image ) : ?>
                                <div class="services__item-ico">
                                    <?php echo wp_get_attachment_image( $service_image, $size ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (get_sub_field( 'title' )) { ?>
                                <div class="services__item-title">
                                    <h3><?php the_sub_field( 'title' ); ?></h3>
                                </div>
                            <?php } ?>
                        </div>

                        <?php if (get_sub_field( 'descriprion' )) { ?>
                            <div class="services__item-text">
                                <?php the_sub_field( 'descriprion' ); ?>
                            </div>
                        <?php } ?>

                        <?php if (get_sub_field( 'button_text' )) { ?>
                            <div class="services__item-link">
                                <a href="openPopup-form-popup"><?php the_sub_field( 'button_text' ); ?></a>
                            </div>
                        <?php } ?>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>