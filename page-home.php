<?php
/*
 Template Name: Home Page Template
*/
?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
        <div class="home-left">
            <?php if (have_posts()): the_post(); // load the page ?>
                <?php $post_id = get_the_ID(); ?>
                <section class="panel panel-features">
                    <div class="row">
                        <div class="panel__inner panel-features__inner">
                            <div class="panel-features__block">
                                <div class="panel-features__block--tile">
                                    <?php $icon = get_post_meta($post_id, 'home-feature-1-icon', true); ?>
                                    <?php $icon = $icon ? $icon : 'fa-question'; ?>
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="primary-color fa <?php echo $icon;?> fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <h3><?php echo get_post_meta($post_id, 'home-feature-1-headline', true); ?></h3>
                                    <p><?php echo get_post_meta($post_id, 'home-feature-1-content', true); ?></p>
                                </div>
                            </div>
                            <div class="panel-features__block">
                                <div class="panel-features__block--tile">
                                    <?php $icon = get_post_meta($post_id, 'home-feature-2-icon', true); ?>
                                    <?php $icon = $icon ? $icon : 'fa-question'; ?>
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="primary-color fa <?php echo $icon;?> fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <h3><?php echo get_post_meta($post_id, 'home-feature-2-headline', true); ?></h3>
                                    <p><?php echo get_post_meta($post_id, 'home-feature-2-content', true); ?></p>
                                </div>
                            </div>
                            <div class="panel-features__block">
                                <div class="panel-features__block--tile">
                                    <?php $icon = get_post_meta($post_id, 'home-feature-3-icon', true); ?>
                                    <?php $icon = $icon ? $icon : 'fa-question'; ?>
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="primary-color fa <?php echo $icon;?> fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <h3><?php echo get_post_meta($post_id, 'home-feature-3-headline', true); ?></h3>
                                    <p><?php echo get_post_meta($post_id, 'home-feature-3-content', true); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <?php $testimonials = get_post_meta($post_id, 'home-testimonial-posts', true); ?>
                <?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
                    <section class="panel panel-testimonials">
                        <div class="panel__inner panel-testimonials__inner">
                            <h2><?php echo get_post_meta($post_id, 'home-testimonials-headline', true); ?></h2>
                            <div>
                                <?php foreach ($testimonials as $testimonial) : ?>
                                    <?php $location = get_post_meta($testimonial, 'testimonial-author-location', true); ?>
                                    <div class="panel-testimonials__block">
                                        <p><i class="fa fa-quote-left fa-2x pull-left"></i> <?php echo get_post_meta($testimonial, 'testimonial-quote-text', true); ?></p>
                                        <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span class="primary-color"><?php echo $location; ?></span><?php endif;?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <section class="panel panel-close">
                    <div class="pannel__inner panel-close__inner">
                        <h2><?php echo get_post_meta($post_id, 'home-bottom-headline', true); ?></h2>
                        <?php echo get_post_meta($post_id, 'home-bottom-content', true); ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
