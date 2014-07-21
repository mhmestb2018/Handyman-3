<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title('|', true, 'right'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <header class="header">
            <div class="header__inner">
                <div class="header__left">
                    <div class="title">
                        <?php
                            $company_name = of_get_option('tradesman_company_name');
                            $name_start = substr($company_name, 0, strpos($company_name, ' '));
                            $name_end = substr($company_name, strpos($company_name, ' ')+1);
                        ?>
                        <a rel="home" title="<?php echo $company_name; ?>" href="<?php echo site_url(); ?>"><?php echo $name_start; ?><span><?php echo $name_end; ?></span></a>
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
                            <a data-target="menu-toggle" class="menu-toggle" href="javascript:void(0);"><i class="fa fa-align-justify fa-2x"></i></a>

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

                            <div class="quote">
                                <a href="#">Free Quote</a>
                            </div>
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
                                <?php foreach ($items as $item) : ?>
                                    <li><i class="fa fa-li fa-check-square-o"></i><?php echo $item;?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="home-cta__right">
                            <h2><?php echo get_post_meta($post_id, 'home-cta-form-headline', true); ?></h2>

                            <div class="row">
                                <?php echo do_shortcode(get_post_meta($post_id, 'home-cta-form-shortcode', true)); ?>
                            </div>
                        </div>

                        <?php $attach_id =  get_post_meta($post_id, 'home-cta-image', true); ?>
                        <?php if ($attach_id) : ?>
                            <div class="home-cta__right-far"><img src="<?php echo wp_get_attachment_url($attach_id); ?>"></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </header>
		






