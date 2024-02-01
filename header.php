<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="app">
    <header class="header">
        <div class="container">
            <div class="header__container">
                <div class="header__logo-container">
                    <a href="" class="header__logo">
                        <?php $header_logo_white = get_field( 'header_logo_white', 'options' ); ?>
                        <?php $size = '158_50'; ?>
                        <?php if ( $header_logo_white ) : ?>
                            <?php
                            $attr = array('class' => 'header__logo-white');
                            echo wp_get_attachment_image( $header_logo_white, $size, false, $attr );
                            ?>
                        <?php endif; ?>

                        <?php $header_logo_black = get_field( 'header_logo_black' , 'options'); ?>
                        <?php $size = '158_50'; ?>
                        <?php if ( $header_logo_black ) : ?>
                            <?php
                            $attr = array('class' => 'header__logo-black');
                            echo wp_get_attachment_image( $header_logo_black, $size, false, $attr );
                            ?>
                        <?php endif; ?>
                    </a>
                </div>
                <nav class="header__nav">
                    <?php raccocleaning_header_menu(); ?>
                </nav>
                <div class="header__btns">
                    <?php if(get_field( 'header_phone', 'options')) {?>
                        <a href="tel:<?php the_field( 'header_phone' , 'options'); ?>" class="button  button--color-primary-2   button--no-border mobile-hide  ">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_142_56)">
                                    <path d="M14.5916 11.5085L12.4983 9.41519C11.7507 8.66759 10.4798 8.96666 10.1807 9.93852C9.95646 10.6114 9.20886 10.9852 8.53601 10.8356C7.0408 10.4618 5.02227 8.51807 4.64847 6.9481C4.42418 6.27522 4.87275 5.52762 5.54559 5.30336C6.51748 5.00432 6.81652 3.73339 6.06892 2.98579L3.97562 0.892493C3.37754 0.369169 2.48041 0.369169 1.95709 0.892493L0.536636 2.31294C-0.883814 3.80815 0.686158 7.77046 4.1999 11.2842C7.71365 14.798 11.676 16.4427 13.1712 14.9475L14.5916 13.527C15.115 12.9289 15.115 12.0318 14.5916 11.5085Z" fill="#F1C40F" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_142_56">
                                        <rect width="15" height="15" fill="white" transform="translate(0 0.5)" />
                                    </clipPath>
                                </defs>
                            </svg> <?php the_field( 'header_phone', 'options'); ?> </a>
                    <?php } ?>

                    <?php if ( get_field( 'header_button', 'options' ) ) : ?>
                        <button class="button  button--color-primary-2   button-- openPopup-form-popup  "> <?php the_field( 'header_button', 'options'); ?> </button>
                        <div class="header__menu">
                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.7708 31H3.22917C1.44796 31 0 29.5507 0 27.7708V3.22917C0 1.44925 1.44796 0 3.22917 0H27.7708C29.552 0 31 1.44925 31 3.22917V27.7708C31 29.5507 29.552 31 27.7708 31ZM3.22917 1.29167C2.16096 1.29167 1.29167 2.16096 1.29167 3.22917V27.7708C1.29167 28.839 2.16096 29.7083 3.22917 29.7083H27.7708C28.839 29.7083 29.7083 28.839 29.7083 27.7708V3.22917C29.7083 2.16096 28.839 1.29167 27.7708 1.29167H3.22917Z" fill="#F1C40F" />
                                <path d="M21.3123 10.3334H9.68734C9.33084 10.3334 9.0415 10.044 9.0415 9.68752C9.0415 9.33102 9.33084 9.04169 9.68734 9.04169H21.3123C21.6688 9.04169 21.9582 9.33102 21.9582 9.68752C21.9582 10.044 21.6688 10.3334 21.3123 10.3334Z" fill="#F1C40F" />
                                <path d="M21.3123 16.1459H9.68734C9.33084 16.1459 9.0415 15.8565 9.0415 15.5C9.0415 15.1435 9.33084 14.8542 9.68734 14.8542H21.3123C21.6688 14.8542 21.9582 15.1435 21.9582 15.5C21.9582 15.8565 21.6688 16.1459 21.3123 16.1459Z" fill="#F1C40F" />
                                <path d="M21.3123 21.9584H9.68734C9.33084 21.9584 9.0415 21.669 9.0415 21.3125C9.0415 20.956 9.33084 20.6667 9.68734 20.6667H21.3123C21.6688 20.6667 21.9582 20.956 21.9582 21.3125C21.9582 21.669 21.6688 21.9584 21.3123 21.9584Z" fill="#F1C40F" />
                            </svg>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </header>
    <div class="menu">
        <div class="menu__close">
            <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/static/app/img/ico-close.svg" alt="close">
        </div>
        <div class="menu__inner">
            <a href="/" class="menu__logo header__logo">
                <?php $header_logo_black = get_field( 'header_logo_black', 'options' ); ?>
                <?php $size = 'full'; ?>
                <?php if ( $header_logo_black ) : ?>
                    <?php
                    echo wp_get_attachment_image( $header_logo_black, $size, false );
                    ?>
                <?php endif; ?>
            </a>
            <?php if(get_field( 'header_phone', 'options' )) {?>
                <div class="menu__btn">
                    <a href="tel:<?php the_field( 'header_phone', 'options' ); ?>" class="button  button--color-primary-2   button--no-border  ">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_142_56)">
                                <path d="M14.5916 11.5085L12.4983 9.41519C11.7507 8.66759 10.4798 8.96666 10.1807 9.93852C9.95646 10.6114 9.20886 10.9852 8.53601 10.8356C7.0408 10.4618 5.02227 8.51807 4.64847 6.9481C4.42418 6.27522 4.87275 5.52762 5.54559 5.30336C6.51748 5.00432 6.81652 3.73339 6.06892 2.98579L3.97562 0.892493C3.37754 0.369169 2.48041 0.369169 1.95709 0.892493L0.536636 2.31294C-0.883814 3.80815 0.686158 7.77046 4.1999 11.2842C7.71365 14.798 11.676 16.4427 13.1712 14.9475L14.5916 13.527C15.115 12.9289 15.115 12.0318 14.5916 11.5085Z" fill="#F1C40F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_142_56">
                                    <rect width="15" height="15" fill="white" transform="translate(0 0.5)" />
                                </clipPath>
                            </defs>
                        </svg> <?php the_field( 'header_phone', 'options' ); ?> </a>
                </div>
            <?php } ?>

            <nav class="menu__nav">
                <?php raccocleaning_header_menu(); ?>
            </nav>
        </div>
    </div>

    <main class="content">