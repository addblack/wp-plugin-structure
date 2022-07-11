<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Api\Callbacks;

use inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function checkbox_sanitize($input)
	{
		// We need only 0 or 1
		//return filter_var($input, FILTER_SANITIZE_NUMBER_INT);

        $output = array();

        foreach ( $this->managers as $key => $value ) {
            $output[$key] = isset( $input[$key] ) ? true : false;
        }

        return $output;
	}


	public function admin_section_manager()
	{
		echo 'Manage the sections and features of this plugin';
	}

	public function checkbox_field($args): void
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );

		$checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}
}

