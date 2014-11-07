<?php
/*
 Template Name: Services Template
*/
?>
<?php get_header(); ?>
<div class="heading">
                        <h1><?php echo get_post_meta($post_id, 'services-template-page-headline', true); ?></h1>
                    </div>
<div class="wrapper">
    <div class="container">
        <?php if (have_posts()): the_post(); // load the page ?>
            <?php $post_id = get_the_ID(); ?>
            <section class="panel post-content panel-services">
                <div class="panel__inner">

                    <?php $services = get_post_meta($post_id, 'service-posts', true); ?>
                    <?php if (is_array($services) && count($services) > 0) : ?>
                        <?php foreach ($services as $service) : ?>
                            <?php $service_post = get_post($service); ?>
                            <?php $service_id = get_the_ID(); ?>
                            <div class="panel-services__block">
                                <?php $attach_id =  get_post_meta($service, 'service-image', true); ?>
                                <?php if ($attach_id) : ?>
                                    <div class="panel-services__block-image-wrapper">
                                        <img src="<?php echo wp_get_attachment_url($attach_id); ?>" alt="<?php echo $service_post->post_title;?>" title="<?php echo $service_post->post_title;?>">
                                        <h3><?php echo $service_post->post_title;?></h3>
                                    </div>
                                <?php else : ?>
                                    <h3><?php echo $service_post->post_title;?></h3>
                                <?php endif; ?>


                                <?php echo get_post_meta($service, 'service-content', true); ?>
                            </div>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
            </section>

            <section class="panel panel-why-us">
                <div class="panel__inner">
                    <?php $headline = get_post_meta($post_id, 'services-template-block-headline', true); ?>
                    <?php $content = get_post_meta($post_id, 'services-template-block-content', true); ?>

                    <?php if ($headline != '' || $content != '') : ?>
                        <div class="panel-why-us__choose">
                            <h2><?php echo $headline; ?></h2>
                            <?php echo $content; ?>
                        </div>
                    <?php endif; ?>

                    <?php $headline = get_post_meta($post_id, 'services-template-form-headline', true); ?>
                    <?php $content = get_post_meta($post_id, 'services-template-form-content', true); ?>
                    <?php $shortcode = get_post_meta($post_id, 'services-template-form-shortcode', true); ?>
                    <?php if ($headline != '' || $content != '' || $shortcode != '') : ?>
                        <div class="panel-why-us__contact panel-contact">
                            <h2><i class="fa fa-envelope-o"></i> <?php echo $headline; ?></h2>

                            <p><?php echo $content; ?></p>

                            <div class="row">
                                <?php echo do_shortcode($shortcode); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
