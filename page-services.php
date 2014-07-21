<?php
/*
 Template Name: Services Template
*/
?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php $post_id = get_the_ID(); ?>
            <section class="panel post-content panel-services">
                <div class="panel__inner">
                    <div class="heading">
                        <h1><i class="fa fa-wrench"></i> <?php echo get_post_meta($post_id, 'services-template-page-headline', true); ?></h1>
                    </div>

                    <?php $args = array('post_type' => 'services'); ?>
                    <?php $query = new WP_Query($args); ?>

                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : ?>
                            <?php $query->the_post(); ?>
                            <?php $service_id = get_the_ID(); ?>
                            <div class="panel-services__block">
                                <?php $attach_id =  get_post_meta($service_id, 'service-image', true); ?>
                                <?php if ($attach_id) : ?>
                                    <img src="<?php echo wp_get_attachment_url($attach_id); ?>" alt="<?php the_title();?>" title="<?php the_title();?>">
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>

                                <?php echo get_post_meta($service_id, 'service-content', true); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>

            <section class="panel panel-why-us">
                <div class="panel__inner">
                    <div class="panel-why-us__choose">
                        <h2><i class="fa fa-question-circle"></i> <?php echo get_post_meta($post_id, 'services-template-block-headline', true); ?></h2>
                        <?php echo get_post_meta($post_id, 'services-template-block-content', true); ?>
                    </div>

                    <div class="panel-why-us__contact panel-contact">
                        <h2><i class="fa fa-envelope-o"></i> <?php echo get_post_meta($post_id, 'services-template-form-headline', true); ?></h2>

                        <p><?php echo get_post_meta($post_id, 'services-template-form-content', true); ?></p>

                        <div class="row">
                            <?php echo do_shortcode(get_post_meta($post_id, 'services-template-form-shortcode', true)); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
