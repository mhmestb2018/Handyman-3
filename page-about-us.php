<?php
/*
 Template Name: About Us Template
*/
?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php $post_id = get_the_ID(); ?>
            <section class="panel post-content panel-about">
                <div class="panel__inner">
                    <div class="heading">
                        <h1><?php the_title(); ?></h1>
                    </div>

                    <?php $attach_id =  get_post_meta($post_id, 'about-template-image', true); ?>
                    <?php if ($attach_id) : ?>
                        <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                    <?php endif; ?>

                    <div class="panel__inner-about-wrapper<?php if (!$attach_id) : ?> panel__inner-about-wrapper-full<?php endif; ?>">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>

            <?php $team_members = get_post_meta($post_id, 'about-team-posts', true); ?>
            <?php if (is_array($team_members) && count($team_members) > 0) : ?>
                <?php $wide = count($team_members) > 4 ? 4 : count($team_members); ?>
                <section class="panel panel-meet-team panel-meet-team-<?php echo $wide; ?>-wide">
                    <div class="panel__inner">
                        <h2><?php echo get_post_meta($post_id, 'about-template-team-headline', true); ?></h2>

                        <?php foreach ($team_members as $team_member) : ?>
                            <?php $team_member_post = get_post($team_member); ?>
                            <?php $attach_id =  get_post_meta($team_member, 'team-member-image', true); ?>

                            <div class="panel-meet-team__team-member">
                                <?php if ($attach_id) : ?>
                                    <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                                <?php endif; ?>
                                <h3><?php echo $team_member_post->post_title; ?></h3>
                                <p class="team-title"><?php echo get_post_meta($team_member, 'team-member-job-title', true); ?></p>
                                <p class="team-description"><?php echo get_post_meta($team_member, 'team-member-content', true); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php $testimonials = get_post_meta($post_id, 'about-testimonial-posts', true); ?>
            <?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
                <section class="panel panel-testimonials">
                    <div class="panel__inner panel-testimonials__inner">
                        <h2><?php echo get_post_meta($post_id, 'about-template-testimonials-headline', true); ?></h2>
                        <div>
                            <?php foreach ($testimonials as $testimonial) : ?>
                                <?php $location = get_post_meta($testimonial, 'testimonial-author-location', true); ?>
                                <div class="panel-testimonials__block block-<?php echo count($testimonials); ?>">
                                    <p><i class="fa fa-quote-left fa-2x pull-left"></i> <?php echo get_post_meta($testimonial, 'testimonial-quote-text', true); ?></p>
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
