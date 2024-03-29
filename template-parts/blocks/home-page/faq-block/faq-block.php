<section class="faq" id="faq">
    <div class="container">
        <?php if (get_field( 'title' )) { ?>
            <div class="section-title">
                <h2><?php the_field( 'title' ); ?></h2>
            </div>
        <?php } ?>

        <div class="faq__container">
            <?php if ( have_rows( 'faq_items' ) ) : ?>
                <div class="faq__list">
                    <div class="accordion-list">
                        <?php while ( have_rows( 'faq_items' ) ) : the_row(); ?>
                            <div class="accordion">
                                <div class="accordion__head">
                                    <?php if (get_sub_field( 'question' )) { ?>
                                        <h3><?php the_sub_field( 'question' ); ?></h3>
                                    <?php } ?>

                                    <div class="accordion__ico">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="accordion__ico-vertical" d="M7.5 15C7.30575 15 7.11946 14.9228 6.9821 14.7855C6.84474 14.6481 6.76758 14.4618 6.76758 14.2676V0.732422C6.76758 0.538172 6.84474 0.351877 6.9821 0.214521C7.11946 0.0771657 7.30575 0 7.5 0C7.69425 0 7.88054 0.0771657 8.0179 0.214521C8.15526 0.351877 8.23242 0.538172 8.23242 0.732422V14.2676C8.23242 14.4618 8.15526 14.6481 8.0179 14.7855C7.88054 14.9228 7.69425 15 7.5 15Z" fill="#4DA390" />
                                            <path class="accordion__ico-horizontal" d="M14.2676 8.23242H0.732422C0.538172 8.23242 0.351877 8.15526 0.214521 8.0179C0.0771657 7.88054 0 7.69425 0 7.5C0 7.30575 0.0771657 7.11946 0.214521 6.9821C0.351877 6.84474 0.538172 6.76758 0.732422 6.76758H14.2676C14.4618 6.76758 14.6481 6.84474 14.7855 6.9821C14.9228 7.11946 15 7.30575 15 7.5C15 7.69425 14.9228 7.88054 14.7855 8.0179C14.6481 8.15526 14.4618 8.23242 14.2676 8.23242Z" fill="#4DA390" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="accordion__body">
                                    <?php if (get_sub_field( 'answer' )) { ?>
                                        <div class="accordion__body-inner">
                                            <?php the_sub_field( 'answer' ); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php $faq_image = get_field( 'faq_image' ); ?>
            <?php $size = '521_520'; ?>
            <?php if ( $faq_image ) : ?>
                <div class="faq__img">
                    <?php echo wp_get_attachment_image( $faq_image, $size ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>