<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $favicon = of_get_option('tradesman_favicon'); ?>
        <?php if ($favicon) : ?>
            <link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
            <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
        <?php endif; ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <header class="header">
            <div class="header__inner">
                <div class="header__left">
                    <div class="title">
                        <?php
                            $company_logo = of_get_option('tradesman_company_logo');
                            $company_name = of_get_option('tradesman_company_name');
                        ?>

                        <?php if ($company_logo) : ?>
                            <a rel="home" title="<?php echo $company_name; ?>" href="<?php echo site_url(); ?>">
                                <img src="<?php echo $company_logo; ?>" alt="<?php echo $company_name; ?>" title="<?php echo $company_name; ?>"/>
                            </a>
                        <?php else : ?>
                            <?php

                                $pos = strpos($company_name, ' ');
                                $name_start = substr($company_name, 0, strpos($company_name, ' '));
                                $name_end = substr($company_name, strpos($company_name, ' ')+1);
                            ?>
                            <a rel="home" title="<?php echo $company_name; ?>" href="<?php echo site_url(); ?>">
                                <?php if ($pos === false) : ?>
                                    <?php echo $company_name; ?>
                                <?php else: ?>
                                    <?php echo $name_start; ?><span class="primary-color"><?php echo $name_end; ?></span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="header__right">
                    <?php $cell_number = of_get_option('tradesman_cell_number'); ?>
                    <?php if ($cell_number) : ?>
                        <div class="header__right--block">
                            <h3><i class="fa fa-mobile"></i> <span class="header__right--mobile-num"><a href="tel:<?php echo $cell_number; ?>"><?php echo $cell_number; ?></a></span></h3>
                        </div>
                    <?php endif; ?>

                    <?php $phone_number = of_get_option('tradesman_phone_number'); ?>
                    <?php if ($phone_number) : ?>
                        <div class="header__right--block">
                            <h3><i class="fa fa-phone"></i> <span class="header__right--phone-num"><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></span></h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <section class="site-navigation">
                <div class="site-navigation__inner">
                    <div class="width-restrict">
                        <nav class="m-main-navigation">
                            <a data-target="menu-toggle" class="menu-toggle" href="javascript:void(0);"><span>Menu</span> <i class="fa fa-bars fa-2x"></i></a>

                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'header_navigation',
                                    'container' => '',
                                    'container_class' => '',
                                    'menu_class' => 'navigation__items',
                                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                    'depth' => 1,
                                    'walker' => new WordPress\Themes\Tradesman\Tradesman_Walker()
                                )
                            );
                            ?>

                            <?php $contact_page = of_get_option('tradesman_contact_page'); ?>
                            <?php if ($contact_page && $contact_page > 0) : ?>
                                <div class="quote">
                                    <a href="<?php echo get_permalink($contact_page); ?>">Free Quote</a>
                                </div>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </section>

            <?php if (is_front_page()) : ?>
                <?php $post_id = get_option('page_on_front'); ?>
                <div class="home-cta">
                    <div class="home-cta__inner">
                        <div class="home-cta__left">
                            <h2><?php echo get_post_meta($post_id, 'home-cta-list-headline', true); ?></h2>

                            <ul class="home-cta__left--check-list fa-ul">
                                <?php $items =  get_post_meta($post_id, 'home-cta-list-items', true); ?>
                                <?php if ($items) : ?>
                                    <?php foreach ($items as $item) : ?>
                                        <li><i class="fa fa-li fa-check-square-o"></i><?php echo $item;?></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="home-cta__right">
                            <h2><?php echo get_post_meta($post_id, 'home-cta-form-headline', true); ?></h2>

                            <div class="home-cta__holder">
                                <?php echo do_shortcode(get_post_meta($post_id, 'home-cta-form-shortcode', true)); ?>
                            </div>
                        </div>

                    </div>
                    <?php $bg_image = get_post_meta($post_id, 'home-cta-bg-image', true); ?>
                    <div class="home-cta__background"<?php if ($bg_image) : ?> style="background-image: url('<?php echo wp_get_attachment_url($bg_image);?>')"<?php endif; ?>>
                	    <div class="header-pattern"></div>
                	</div>
                </div>
            <?php endif; ?>
        </header>
		






