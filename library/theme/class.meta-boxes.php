<?php

namespace Wordpress\Themes\Tradesman;

class MetaBoxes {
	public function get_meta_boxes()
	{
		$meta_boxes = array_merge(
			$this->_define_global_meta_boxes()
		);

		return $meta_boxes;
	}

	private function _define_global_meta_boxes()
	{
		return array(
			array(
				'id' => 'example',
				'title' => __('Test Metabox', 'rwmb'),
				'pages' => array('page'),
				'context' => 'normal',
				'priority' => 'high',
				'autosave' => TRUE,
				'fields' => array(
					array(
						'name' => __('Test123', 'rwmb'),
						'id' => 'test',
						'type'  => 'text',
						'std'   => __( 'This is a test', 'rwmb' ),
						'clone' => FALSE,
					)
				)
			)
		);
	}
}
