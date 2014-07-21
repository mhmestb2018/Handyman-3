<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php $post_id = get_the_ID(); ?>
            <div class="home-left">
                <section class="panel post-content">
                    <div class="panel__inner">
                        <div class="heading">
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <?php the_content(); ?>
                    </div>
                </section>
            </div>
        <?php endif; ?>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
