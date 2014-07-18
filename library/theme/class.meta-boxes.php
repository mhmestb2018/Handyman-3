<?php

namespace Wordpress\Themes\Tradesman;

class MetaBoxes
{
    public function get_meta_boxes()
    {
        $meta_boxes = array_merge(
            $this->_define_homepage_meta_boxes(),
            $this->_define_testimonial_meta_boxes(),
            $this->_define_service_meta_boxes(),
            $this->_define_service_template_meta_boxes(),
            $this->_define_about_template_meta_boxes(),
            $this->_define_team_member_meta_boxes()
        );

        return $meta_boxes;
    }

    private function _define_homepage_meta_boxes()
    {
        return array(
            array(
                'id' => 'home-cta',
                'title' => __('Homepage CTA Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => 'page-home.php',
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('List Headline', 'rwmb'),
                        'id' => 'home-cta-list-headline',
                        'type' => 'text',
                        'std' => __('Why Choose Us?', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('List Items', 'rwmb'),
                        'id' => 'home-cta-list-items',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => true,
                    ),
                    array(
                        'name' => __('Form Headline', 'rwmb'),
                        'id' => 'home-cta-form-headline',
                        'type' => 'text',
                        'std' => __('Request Your Free Quote', 'rwmb'),
                        'clone' => false,
                    )
                )
            ),
            array(
                'id' => 'home-feature-blocks',
                'title' => __('Homepage Feature Block Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => 'page-home.php',
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Feature 1 Icon', 'rwmb'),
                        'id' => 'home-feature-1-icon',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Feature 1 Headline', 'rwmb'),
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
                        'name' => __('Feature 2 Icon', 'rwmb'),
                        'id' => 'home-feature-2-icon',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Feature 2 Headline', 'rwmb'),
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
                        'name' => __('Feature 3 Icon', 'rwmb'),
                        'id' => 'home-feature-3-icon',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Feature 3 Headline', 'rwmb'),
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
                    ),
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
                'template' => 'page-services.php',
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Block Headline', 'rwmb'),
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
                    ),
                    array(
                        'name' => __('Form Headline', 'rwmb'),
                        'id' => 'services-template-form-headline',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Form Content', 'rwmb'),
                        'id' => 'services-template-form-content',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
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
                'title' => __('About Template Fields', 'rwmb'),
                'pages' => array('page'),
                'template' => 'page-about-us.php',
                'context' => 'normal',
                'priority' => 'high',
                'autosave' => true,
                'fields' => array(
                    array(
                        'name' => __('Content Image', 'rwmb'),
                        'id' => 'about-template-image',
                        'type' => 'image_advanced',
                        'clone' => false,
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
                        'name' => __('Quote Text', 'rwmb'),
                        'id' => 'testimonial-quote-text',
                        'type' => 'textarea',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Quote Author', 'rwmb'),
                        'id' => 'testimonial-quote-author',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Quote Author Location', 'rwmb'),
                        'id' => 'testimonial-author-location',
                        'type' => 'text',
                        'std' => __('', 'rwmb'),
                        'desc'  => __('The location of the quote author', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Quote Photo', 'rwmb'),
                        'id' => 'testimonial-quote-author',
                        'type' => 'image_advanced',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Show on Homepage', 'rwmb'),
                        'id'   => "testimonial-show-on-homepage",
                        'type' => 'checkbox',
                        'desc'  => __('Checking this box will cause the quote to appear on the homepage', 'rwmb'),
                        'std'  => 0,
                    ),
                    array(
                        'name' => __('Show on About Us Page', 'rwmb'),
                        'id'   => "testimonial-show-on-about",
                        'type' => 'checkbox',
                        'desc'  => __('Checking this box will cause the quote to appear on the about us page', 'rwmb'),
                        'std'  => 0,
                    ),
                    array(
                        'name' => __('Show on Contact Us Page', 'rwmb'),
                        'id'   => "testimonial-show-on-contact",
                        'type' => 'checkbox',
                        'desc'  => __('Checking this box will cause the quote to appear on the contact us page', 'rwmb'),
                        'std'  => 0,
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
                        'name' => __('Header Image', 'rwmb'),
                        'id' => 'service-image',
                        'type' => 'image_advanced',
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Content', 'rwmb'),
                        'id' => 'service-content',
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
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
                        'name' => __('Profile Picture', 'rwmb'),
                        'id' => 'team-member-image',
                        'type' => 'image_advanced',
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Job title', 'rwmb'),
                        'id' => 'team-member-job-title',
                        'type' => 'text',
                        'clone' => false,
                    ),
                    array(
                        'name' => __('Content', 'rwmb'),
                        'id' => 'team-member-content',
                        'type' => 'wysiwyg',
                        'std' => __('', 'rwmb'),
                        'clone' => false,
                    )
                )
            )
        );
    }
}
