<?php get_header(); ?>

<?php if (have_posts()): the_post(); // load the page ?>
<?php $post_id = get_the_ID(); ?>
    <div class="heading">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="wrapper">
        <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="home-left">
                        <section class="panel post-content">
                            <div class="panel__inner">
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
                            </div>
                        </section>
                    </div>
                </article>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
