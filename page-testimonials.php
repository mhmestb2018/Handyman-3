<?php
/*
 Template Name: Testimonials Template
*/
?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php
                $post_id = get_the_ID();

                $format = get_post_meta($post_id, 'testimonials-format', true);
                $format = $format ? $format : \Wordpress\Themes\Tradesman\MetaBoxes::TESTIMONIALS_3_WIDE; //default to 3 wide

                $format_class = ' block-3';
                $row_size = 3;
                if ($format == \Wordpress\Themes\Tradesman\MetaBoxes::TESTIMONIALS_2_WIDE) {
                    $format_class = ' block-2';
                    $row_size = 2;
                } elseif ($format == \Wordpress\Themes\Tradesman\MetaBoxes::TESTIMONIALS_FULL_WIDTH) {
                    $format_class = ' block-1';
                    $row_size = 1;
                }

            ?>

            <section class="panel post-content panel-testimonials">
            	<div class="heading">
                	<h1><?php the_title(); ?></h1>
                </div>
                <div class="panel__inner panel-testimonials__inner">

                    <?php $testimonials = get_post_meta($post_id, 'testimonial-posts', true); ?>
                    <?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
                        <?php $count = 1; ?>
                        <?php foreach ($testimonials as $testimonial) : ?>
                            <?php $testimonial_id = $testimonial; ?>
                            <?php $location = get_post_meta($testimonial_id, 'testimonial-author-location', true); ?>
                            <?php $attach_id =  get_post_meta($testimonial_id, 'testimonial-quote-photo', true); ?>
                            <div class="panel-testimonials__block<?php echo $format_class; ?>">
                                <?php if ($attach_id) : ?>
                                    <img src="<?php echo wp_get_attachment_url($attach_id); ?>">
                                        <div class="testimonial">
                                <?php endif; ?>
                                <p><i class="fa fa-quote-left fa-2x pull-left"></i> <?php echo get_post_meta($testimonial_id, 'testimonial-quote-text', true); ?></p>
                                <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial_id, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span><?php echo $location; ?></span><?php endif;?></p>
                                <?php if ($attach_id) : ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
