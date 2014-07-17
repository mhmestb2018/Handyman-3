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
                <!--[if lt IE 10]>
                <div class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a class="button is-white is-outlined" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</div>
                <![endif]-->
                <div class="header__left">
                    <div class="title">
                        <a rel="home" title="TradePLumber" href="/">TRADE<span>PLUMBER</span></a>
                    </div>
                </div>

                <div class="header__right">
                    <div class="header__right--block">
                        <h3><i class="fa fa-mobile"></i> <span class="header__right--mobile-num"><a href="tel:+13174562564">123-456-789</a></span></h3>
                    </div>

                    <div class="header__right--block">
                        <h3><i class="fa fa-phone"></i> <span class="header__right--phone-num"><a href="tel:+13174562564">123-456-789</a></span></h3>
                    </div>
                </div>
            </div>

            <section class="site-navigation">
                <div class="site-navigation__inner">
                    <div class="width-restrict">
                        <nav class="m-main-navigation">
                            <a data-target="menu-toggle" class="menu-toggle" href="javascript:void(0);"><i class="fa fa-align-justify fa-2x"></i></a>

                            <ul>
                                <!-- Output like this to avoid 4px gap put in when using inline-block -->

                                <li>
                                    <a href="#" class="active">Home</a>
                                </li>

                                <li>
                                    <a href="#">Services</a>
                                </li>

                                <li>
                                    <a href="#">Testimonials</a>
                                </li>

                                <li>
                                    <a href="#">About Us</a>
                                </li>

                                <li>
                                    <a href="#">Contact Us</a>
                                </li>

                                <li class="quote">
                                    <a href="#">Free Quote</a>
                                </li>
                            </ul>

                            <?php
                            /*wp_nav_menu(
                                array(
                                    'theme_location' => 'header_navigation',
                                    'container' => 'nav',
                                    'container_class' => 'navigation',
                                    'menu_class' => 'navigation__items',
                                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                    'depth' => 1,
                                    'walker' => new WordPress\Themes\Tradesman\Tradesman_Walker()
                                )
                            );*/
                            ?>
                        </nav>
                    </div>
                </div>
            </section>

            <?php if (is_front_page()) : ?>
                <div class="home-cta">
                    <div class="home-cta__inner">
                        <div class="home-cta__left">
                            <h2>Why Choose Us?</h2>

                            <ul class="home-cta__left--check-list fa-ul">
                                <li><i class="fa fa-li fa-check-square-o"></i>Free Quote</li>

                                <li><i class="fa fa-li fa-check-square-o"></i>No Call Out Charge</li>

                                <li><i class="fa fa-li fa-check-square-o"></i>Full Guarantee on all Works</li>

                                <li><i class="fa fa-li fa-check-square-o"></i>Available 24/7</li>

                                <li><i class="fa fa-li fa-check-square-o"></i>Quote WEB10 and save 10%</li>
                            </ul>
                        </div>

                        <div class="home-cta__right">
                            <h2>Request Your Free Quote</h2>

                            <div class="row">
                                <div class="form-half">
                                    <input type="text" name="name" value="" placeholder="Name">
                                </div>

                                <div class="form-half">
                                    <input type="text" name="email" value="" placeholder="Email">
                                </div>

                                <div class="form-full">
                                    <p>
                                        <textarea name="describeJob" cols="45" rows="4" placeholder="Describe your job">
                                        </textarea></p>

                                    <p><button class="btn btn-lg btn-success" type="button"><i class="fa fa-hand-o-right"></i> Get Your Quote</button></p>
                                </div>
                            </div>
                        </div>

                        <div class="home-cta__right-far"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tradesman-1.png"></div>
                    </div>
                </div>
            <?php endif; ?>
        </header>
		






