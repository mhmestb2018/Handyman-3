<?php
/*
 Template Name: About Us Template
*/
?>
<?php get_header(); ?>
<div class="heading">
	<h1><?php the_title(); ?></h1>
</div>
<div class="wrapper">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php $post_id = get_the_ID(); ?>
                <section class="panel post-content panel-about">
                    <div class="panel__inner">

                        <?php $attach_id =  get_post_meta($post_id, 'about-template-image', true); ?>
                        <?php if ($attach_id) : ?>
                            <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                        <?php endif; ?>

                        <div class="panel__inner-about-wrapper<?php if (!$attach_id) : ?> panel__inner-about-wrapper-full<?php endif; ?>">
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

                            <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'handymantheme' ) . '</span> ', ', ', '</p>' ); ?>
                        </div>
                    </div>
                </section>

                <?php $team_members = get_post_meta($post_id, 'about-team-posts', true); ?>
                <?php if (is_array($team_members) && count($team_members) > 0) : ?>
                    <?php $wide = count($team_members) > 3 ? 3 : count($team_members); ?>
                    <section class="panel panel-meet-team panel-meet-team-<?php echo $wide; ?>-wide">
                        <div class="panel__inner">
                            <h2><?php echo get_post_meta($post_id, 'about-template-team-headline', true); ?></h2>

                            <?php foreach ($team_members as $team_member) : ?>
                                <?php $team_member_post = get_post($team_member); ?>
                                <?php $attach_id = get_post_meta($team_member, 'team-member-image', true); ?>

                                <div class="panel-meet-team__team-member">
                                    <?php echo get_the_post_thumbnail($team_member); ?>
                                    <h3><?php echo $team_member_post->post_title; ?></h3>
                                    <p class="team-title primary-color"><?php echo get_post_meta($team_member, 'team-member-job-title', true); ?></p>
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
                                        <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span class="primary-color"><?php echo $location; ?></span><?php endif;?></p>
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


                <?php comments_template(); ?>
            </article>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
