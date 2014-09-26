<?php

namespace Wordpress\Themes\Tradesman;

class MetaBoxes
{
    const HOMEPAGE_TEMPLATE = 'page-home.php';
    const ABOUT_TEMPLATE = 'page-about-us.php';
    const CONTACT_TEMPLATE = 'page-contact.php';
    const SERVICES_TEMPLATE = 'page-services.php';
    const TESTIMONIALS_TEMPLATE = 'page-testimonials.php';

    const TESTIMONIALS_3_WIDE = '3wide';
    const TESTIMONIALS_2_WIDE = '2wide';
    const TESTIMONIALS_FULL_WIDTH = 'fullwidth';



    public function get_meta_boxes()
    {
        $icons = array(
            'fa-bolt' => 'Bolt',
            'fa-bullhorn' => 'Bull Horn',
            'fa-car' => 'Car',
            'fa-check-square-o' => 'Check Box',
            'fa-cog' => 'Cog/Gear',
            'fa-envelope-o' => 'Envelope',
            'fa-home' => 'Home',
            'fa-lightbulb-o' => 'Light Bulb',
            'fa-mobile' => 'Mobile Phone',
            'fa-phone' => 'Phone',
            'fa-road' => 'Road',
            'fa-star' => 'Star',
            'fa-thumbs-o-up' => 'Thumbs Up',
            'fa-truck' => 'Truck',
            'fa-wrench' => 'Wrench',
            'fa-fire' => 'Fire',
            'fa-info-circle' => 'Info Circle',
            'fa-search' => 'Search',
            'fa-tint' => 'Tint',
            'fa-twitter' => 'Twitter',
            'fa-facebook' => 'Facebook',
            'fa-youtube' => 'Youtube'
        );


        if (isset($_GET['post'])) {
            $post_id = intval($_GET['post']);
        } elseif (isset($_POST['post_ID'])) {
            $post_id = intval($_POST['post_ID']);
        } else {
            $post_id = false;
        }

        $post_id = (int)$post_id;

        $template = get_post_meta($post_id, '_wp_page_template', true);

        $meta_boxes = array_merge(
            $this->_define_testimonial_meta_boxes(),
            $this->_define_service_meta_boxes(),
            $this->_define_team_member_meta_boxes()
        );


        if ($template == self::HOMEPAGE_TEMPLATE) {
            $meta_boxes = array_merge($meta_boxes, $this->_define_homepage_meta_boxes($icons));
        } elseif ($template == self::CONTACT_TEMPLATE) {
            $meta_boxes = array_merge($meta_boxes, $this->_define_contact_template_meta_boxes());
        } elseif ($template == self::ABOUT_TEMPLATE) {
            $meta_boxes = array_merge($meta_boxes, $this->_define_about_template_meta_boxes());
        } elseif ($template == self::SERVICES_TEMPLATE) {
            $meta_boxes = array_merge($meta_boxes, $this->_define_service_template_meta_boxes());
        } elseif ($template == self::TESTIMONIALS_TEMPLATE) {
            $meta_boxes = array_merge($meta_boxes, $this->_define_testimonials_template_meta_boxes());
        }

        return $meta_boxes;
    }

    private function _define_homepage_meta_boxes($icons)
    {
        return array(
            array(
                'id' => 'home-cta',
                'title' => __('Header Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::HOMEPAGE_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Benefits Title', 'rwmb'),
                        'id' => 'home-cta-list-headline',
                        'type' => 'text',
                        'placeholder' => __('Why Choose Us?', 'rwmb'),
                        'desc' => __('(e.g. Benefits)', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Benefits', 'rwmb'),
                        'id' => 'home-cta-list-items',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => true,
                    ),
                    array(
                        'name' => __('Form Title', 'rwmb'),
                        'id' => 'home-cta-form-headline',
                        'type' => 'text',
                        'placeholder' => __('Request Your Free Quote', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Form Shortcode', 'rwmb'),
                        'id' => 'home-cta-form-shortcode',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'desc' => __('Paste the contact form shortcode into this field', 'rwmb'),
                        'clone' => false,
                    ),
                    /*array(
                        'name' => __('Your Photo', 'rwmb'),
                        'id' => 'home-cta-image',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1
                    ),*/
                    array(
                        'name' => __('Background Image', 'rwmb'),
                        'id' => 'home-cta-bg-image',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1
                    )
                )
            ),
            array(
                'id' => 'home-feature-blocks',
                'title' => __('Feature Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::HOMEPAGE_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name'     => __('Feture 1 Icon', 'rwmb'),
                        'id'       => "home-feature-1-icon",
                        'type'     => 'select',
                        'options'  => $icons,
                        'multiple'    => false,
                        'std'         => '',
                        'placeholder' => __('Select an Icon', 'rwmb'),
                    ),
                    array(
                        'name' => __('Feature 1 Title', 'rwmb'),
                        'id' => 'home-feature-1-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Feature 1 Content', 'rwmb'),
                        'id' => 'home-feature-1-content',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),

                    array(
                        'name'     => __('Feture 2 Icon', 'rwmb'),
                        'id'       => "home-feature-2-icon",
                        'type'     => 'select',
                        'options'  => $icons,
                        'multiple'    => false,
                        'std'         => '',
                        'placeholder' => __('Select an Icon', 'rwmb'),
                    ),
                    array(
                        'name' => __('Feature 2 Title', 'rwmb'),
                        'id' => 'home-feature-2-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Feature 2 Content', 'rwmb'),
                        'id' => 'home-feature-2-content',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),

                    array(
                        'name'     => __('Feture 3 Icon', 'rwmb'),
                        'id'       => "home-feature-3-icon",
                        'type'     => 'select',
                        'options'  => $icons,
                        'multiple'    => false,
                        'std'         => '',
                        'placeholder' => __('Select an Icon', 'rwmb'),
                    ),
                    array(
                        'name' => __('Feature 3 Title', 'rwmb'),
                        'id' => 'home-feature-3-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Feature 3 Content', 'rwmb'),
                        'id' => 'home-feature-3-content',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    )
                )
            ),
            array(
                'id' => 'home-testimonials',
                'title' => __('Testimonials Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::HOMEPAGE_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Titile', 'rwmb'),
                        'id' => 'home-testimonials-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'desc' => __('(e.g. Testimonials)', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name'    => __('Testimonials', 'rwmb'),
                        'id'      => "home-testimonial-posts",
                        'type'    => 'post',
                        'post_type' => 'testimonials',
                        'field_type' => 'select_advanced',
                        'clone' => true,
                        'desc' => __('You can have a maximum of 3 testimonials on the homepage. Click the blue [+] button to the right to add another testimonial and then use the dropdown to select the testimonial you\'d like to add', 'rwmb'),
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                        )
                    )
                )
            ),
            array(
                'id' => 'home-bottom',
                'title' => __('Call To Action Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::HOMEPAGE_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Title', 'rwmb'),
                        'id' => 'home-bottom-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Content', 'rwmb'),
                        'id' => 'home-bottom-content',
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'description' => __('Use italics to produce the highlight', 'rwmb'),
                        'clone' => false,
                        'options' => array(
                            'textarea_rows' => 10,
                            'teeny'         => true,
                            'media_buttons' => false,
                        )
                    )
                )
            )
        );
    }

    private function _define_service_template_meta_boxes()
    {
        return array(
            array(
                'id' => 'services-template',
                'title' => __('Services Template Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => self::SERVICES_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Page Headline', 'rwmb'),
                        'id' => 'services-template-page-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    )
                )
            ),
            array(
                'id' => 'services-block-template',
                'title' => __('Services Block Template Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => self::SERVICES_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name'    => __('Services', 'rwmb'),
                        'id'      => "service-posts",
                        'type'    => 'post',
                        'post_type' => 'services',
                        'field_type' => 'select_advanced',
                        'clone' => true,
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                        )
                    )
                )
            ),
            array(
                'id' => 'services-about-template',
                'title' => __('About Block Template Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => self::SERVICES_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'services-template-block-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Block Content', 'rwmb'),
                        'id' => 'services-template-block-content',
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                        'options' => array(
                            'textarea_rows' => 10,
                            'teeny'         => true,
                            'media_buttons' => false,
                        )
                    )
                )
            ),
            array(
                'id' => 'services-contact-template',
                'title' => __('Contact Block Template Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => self::SERVICES_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'services-template-form-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Block Content', 'rwmb'),
                        'id' => 'services-template-form-content',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Contact Shortcode', 'rwmb'),
                        'id' => 'services-template-form-shortcode',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'desc' => __('Paste the contact form shortcode into this field', 'rwmb'),
                        'clone' => false,
                    )
                )
            )
        );
    }

    private function _define_about_template_meta_boxes()
    {
        return array(
            array(
                'id' => 'about-template',
                'title' => __('Introduction Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::ABOUT_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Featured Image', 'rwmb'),
                        'id' => 'about-template-image',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1
                    )
                )
            ),
            array(
                'id' => 'about-team',
                'title' => __('Meet The Team Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::ABOUT_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'about-template-team-headline',
                        'type' => 'text',
                        'clone' => false
                    ),
                    array(
                        'name'    => __('Team Members', 'rwmb'),
                        'id'      => "about-team-posts",
                        'type'    => 'post',
                        'post_type' => 'team-members',
                        'field_type' => 'select_advanced',
                        'clone' => true,
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                        )
                    )
                )
            ),

            array(
                'id' => 'about-testimonials',
                'title' => __('Testimonials Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::ABOUT_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'about-template-testimonials-headline',
                        'type' => 'text',
                        'clone' => false
                    ),
                    array(
                        'name'    => __('Testimonials', 'rwmb'),
                        'id'      => "about-testimonial-posts",
                        'type'    => 'post',
                        'post_type' => 'testimonials',
                        'field_type' => 'select_advanced',
                        'clone' => true,
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                        )
                    )
                )
            ),

            array(
                'id' => 'about-bottom',
                'title' => __('Call To Action Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::HOMEPAGE_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'about-bottom-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Block Content', 'rwmb'),
                        'id' => 'about-bottom-content',
                        'description' => __('Use italics to produce the highlight', 'rwmb'),
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                        'options' => array(
                            'textarea_rows' => 10,
                            'teeny'         => true,
                            'media_buttons' => false,
                        )
                    )
                )
            )
        );
    }

    private function _define_contact_template_meta_boxes()
    {
        return array(
            array(
                'id' => 'contact-template',
                'title' => __('Contact Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::CONTACT_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'contact-headline',
                        'type' => 'text',
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Form Shortcode', 'rwmb'),
                        'id' => 'contact-form-shortcode',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'desc' => __('Paste the contact form shortcode into this field', 'rwmb'),
                        'clone' => false,
                    )
                )
            ),
            array(
                'id' => 'contact-testimonials',
                'title' => __('Testimonials Block', 'rwmb'),
                'pages' => array('page'),
                'template' => self::ABOUT_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Title', 'rwmb'),
                        'id' => 'contact-template-testimonials-headline',
                        'type' => 'text',
                        'clone' => false
                    ),
                    array(
                        'name'    => __('Testimonials', 'rwmb'),
                        'id'      => "contact-testimonial-posts",
                        'type'    => 'post',
                        'post_type' => 'testimonials',
                        'field_type' => 'select_advanced',
                        'clone' => true,
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                        )
                    )
                )
            ),
        );
    }

    private function _define_testimonials_template_meta_boxes()
    {
        return array(
            array(
                'id' => 'testimonials-template',
                'title' => __('Testimonials', 'rwmb'),
                'pages' => array('page'),
                'template' => self::CONTACT_TEMPLATE,
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name'     => __( 'Format', 'rwmb' ),
                        'id'       => "testimonials-format",
                        'type'     => 'select',
                        'options'  => array(
                            self::TESTIMONIALS_3_WIDE => __('3 Wide', 'rwmb'),
                            self::TESTIMONIALS_2_WIDE => __('2 Wide', 'rwmb'),
                            self::TESTIMONIALS_FULL_WIDTH => __('Full Width', 'rwmb')
                        ),
                        'multiple'    => false,
                        'std'         => '',
                        'placeholder' => __('Select the format', 'rwmb'),
                    ),
                    array(
                        'name'    => __('Testimonials', 'rwmb'),
                        'id'      => "testimonial-posts",
                        'type'    => 'post',
                        'post_type' => 'testimonials',
                        'field_type' => 'select_advanced',
                        'clone' => true,
                        'query_args' => array(
                            'post_status' => 'publish',
                            'posts_per_page' => '-1',
                        )
                    )
                )
            )
        );
    }

    private function _define_testimonial_meta_boxes()
    {
        return array(
            array(
                'id' => 'testimonial',
                'title' => __('Testimonial Fields', 'rwmb'),
                'pages' => array('testimonials'),
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Testimonial', 'rwmb'),
                        'id' => 'testimonial-quote-text',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Author', 'rwmb'),
                        'id' => 'testimonial-quote-author',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Photo (optional)', 'rwmb'),
                        'id' => 'testimonial-quote-photo',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => __('Location', 'rwmb'),
                        'id' => 'testimonial-author-location',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'desc'  => __('The location of the quote author', 'rwmb'),
                        'clone' => false,
                    )
                )
            )
        );
    }

    private function _define_service_meta_boxes()
    {
        return array(
            array(
                'id' => 'service',
                'title' => __('Service Fields', 'rwmb'),
                'pages' => array('services'),
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Photo', 'rwmb'),
                        'id' => 'service-image',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => __('Content', 'rwmb'),
                        'id' => 'service-content',
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                        'options' => array(
                            'textarea_rows' => 10,
                            'teeny'         => true,
                            'media_buttons' => false,
                        )
                    )
                )
            )
        );
    }

    private function _define_team_member_meta_boxes()
    {
        return array(
            array(
                'id' => 'team-member',
                'title' => __('Team Member Fields', 'rwmb'),
                'pages' => array('team-members'),
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Team Member Photo', 'rwmb'),
                        'id' => 'team-member-image',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => __('Job title', 'rwmb'),
                        'id' => 'team-member-job-title',
                        'type' => 'text',
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Job Description', 'rwmb'),
                        'id' => 'team-member-content',
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                        'options' => array(
                            'textarea_rows' => 10,
                            'teeny'         => true,
                            'media_buttons' => false,
                        )
                    )
                )
            )
        );
    }
}
