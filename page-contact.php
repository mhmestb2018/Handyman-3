<?php
/*
 Template Name: Contact Template
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): the_post(); // load the page ?>
    <?php $post_id = get_the_ID(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="heading">
            <h1><?php the_title();?></h1>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="home-left">
                    <section class="panel panel-contact">
                        <div class="panel__inner panel-contact__inner">
                            <h2><?php echo get_post_meta($post_id, 'contact-headline', true); ?></h2>

                            <?php the_content(); ?>

                            <?php
                                /*
                                 * Link Pages is used in case you have posts that are set to break into
                                 * multiple pages. You can remove this if you don't plan on doing that.
                                 *
                                 * Also, breaking content up into multiple pages is a horrible experience,
                                 * so don't do it. While there are SOME edge cases where this is useful, it's
                                 * mostly used for people to get more ad views. It's up to you but if you want
                                 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                                 *
                                 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                                 *
                                */
                                wp_link_pages(array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                ));
                            ?>

                            <?php comments_template(); ?>

                            <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'handymantheme' ) . '</span> ', ', ', '</p>' ); ?>

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
                <?php get_sidebar(); ?>
            </div>
        </div>
    </article>
<?php endif; ?>

<?php get_footer(); ?>