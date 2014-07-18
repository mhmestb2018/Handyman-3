<?php
/*
 Template Name: Testimonials Template
*/
?>
<?php get_header(); ?>

<div class="home">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php
                $post_id = get_the_ID();

                $format = get_post_meta($post_id, 'testimonials-format', true);
                $format = $format ? $format : \Wordpress\Themes\Tradesman\MetaBoxes::TESTIMONIALS_3_WIDE; //default to 3 wide

                $format_class = '';
                $row_size = 3;
                if ($format == \Wordpress\Themes\Tradesman\MetaBoxes::TESTIMONIALS_2_WIDE) {
                    $format_class = ' block-2';
                    $row_size = 2;
                } elseif ($format == \Wordpress\Themes\Tradesman\MetaBoxes::TESTIMONIALS_FULL_WIDTH) {
                    $format_class = ' block-1';
                    $row_size = 1;
                }

            ?>

            <section class="panel panel-testimonials">
                <div class="panel__inner panel-testimonials__inner">
                    <div class="heading">
                        <h1><?php the_title(); ?></h1>
                    </div>



                    <?php $args = array('post_type' => 'testimonials'); ?>
                    <?php $query = new WP_Query($args); ?>

                    <?php if ($query->have_posts()) : ?>
                        <?php $count = 1; ?>
                        <?php while ($query->have_posts()) : ?>
                            <?php $query->the_post(); ?>
                            <?php $testimonial_id = get_the_ID(); ?>

                            <?php if ($count % $row_size == 1 || $row_size == 1) : ?>
                                <?php if ($count != 1) :  //close the row ?>
                                    </div>
                                    <hr>
                                <?php endif; ?>
                                <div class="row testimonial-row">
                            <?php endif; ?>

                            <?php $location = get_post_meta($testimonial_id, 'testimonial-author-location', true); ?>
                            <?php $attach_id =  get_post_meta($testimonial_id, 'testimonial-quote-photo', true); ?>
                            <div class="panel-testimonials__block<?php echo $format_class; ?>">
                                <?php if ($attach_id) : ?>
                                    <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                                    <div class="testimonial">
                                <?php endif; ?>
                                    <i class="fa fa-quote-left fa-2x pull-left"></i>
                                    <p><?php echo get_post_meta($testimonial_id, 'testimonial-quote-text', true); ?></p>
                                    <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial_id, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span><?php echo $location; ?></span><?php endif;?></p>
                                <?php if ($attach_id) : ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $count++; ?>
                        <?php endwhile; ?>
                        </div> <!-- close the last row -->
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
