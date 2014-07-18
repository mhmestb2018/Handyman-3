<?php
/*
 Template Name: About Us Template
*/
?>
<?php get_header(); ?>

<div class="home">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php $post_id = get_the_ID(); ?>
            <section class="panel panel-about">
                <div class="panel__inner">
                    <div class="heading">
                        <h1><?php echo get_post_meta($post_id, 'about-template-page-headline', true); ?></h1>
                    </div>

                    <?php $attach_id =  get_post_meta($post_id, 'about-template-image', true); ?>
                    <?php if ($attach_id) : ?>
                        <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                    <?php endif; ?>

                    <div class="panel__inner-about-wrapper">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>

            <?php $args = array('post_type' => 'team-members'); ?>
            <?php $query = new WP_Query($args); ?>

            <?php if ($query->have_posts()) : ?>
                <section class="panel panel-meet-team">
                    <div class="panel__inner">
                        <h2><?php echo get_post_meta($post_id, 'about-template-team-headline', true); ?></h2>

                        <?php while ($query->have_posts()) : ?>
                            <?php $query->the_post(); ?>
                            <?php $member_id = get_the_ID(); ?>
                            <?php $attach_id =  get_post_meta($member_id, 'team-member-image', true); ?>


                            <div class="panel-meet-team__team-member">
                                <?php if ($attach_id) : ?>
                                    <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                                <p class="team-title"><?php echo get_post_meta($member_id, 'team-member-job-title', true); ?></p>
                                <p class="team-description"><?php echo get_post_meta($member_id, 'team-member-content', true); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

            <?php $testimonials = get_post_meta($post_id, 'about-testimonial-posts', true); ?>
            <?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
                <section class="panel panel-testimonials">
                    <div class="panel__inner panel-testimonials__inner">
                        <h2><?php echo get_post_meta($post_id, 'about-template-testimonials-headline', true); ?></h2>
                        <div>
                            <?php foreach ($testimonials as $testimonial) : ?>
                                <?php $location = get_post_meta($testimonial, 'testimonial-author-location', true); ?>
                                <div class="panel-testimonials__block">
                                    <i class="fa fa-quote-left fa-2x pull-left"></i>
                                    <p><?php echo get_post_meta($testimonial, 'testimonial-quote-text', true); ?></p>
                                    <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span><?php echo $location; ?></span><?php endif;?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <section class="panel panel-close">
                <div class="pannel__inner panel-close__inner">
                    <h2><?php echo get_post_meta($post_id, 'about-bottom-headline', true); ?></h2>
                    <?php echo get_post_meta($post_id, 'about-bottom-content', true); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
