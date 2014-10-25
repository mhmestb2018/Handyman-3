<?php
/*
 Template Name: Contact Template
*/
?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
    <?php if (have_posts()): the_post(); // load the page ?>
        <?php $post_id = get_the_ID(); ?>
            <div class="home-left">
                <section class="panel panel-contact">
                    <div class="panel__inner panel-contact__inner">
                        <h2><?php echo get_post_meta($post_id, 'contact-headline', true); ?></h2>

                        <?php the_content(); ?>

                        <div class="row">
                            <?php echo do_shortcode(get_post_meta($post_id, 'contact-form-shortcode', true)); ?>
                        </div>
                    </div>
                </section>

                <?php $testimonials = get_post_meta($post_id, 'contact-testimonial-posts', true); ?>
                <?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
                    <section class="panel panel-testimonials">
                        <div class="panel__inner panel-testimonials__inner">
                            <h2><?php echo get_post_meta($post_id, 'contact-template-testimonials-headline', true); ?></h2>
                            <div>
                                <?php foreach ($testimonials as $testimonial) : ?>
                                    <?php $location = get_post_meta($testimonial, 'testimonial-author-location', true); ?>
                                    <div class="panel-testimonials__block block-<?php echo count($testimonials); ?>">
                                        <p><i class="fa fa-quote-left fa-2x pull-left"></i> <?php echo get_post_meta($testimonial, 'testimonial-quote-text', true); ?></p>
                                        <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span class="primary-color"><?php echo $location; ?></span><?php endif;?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>