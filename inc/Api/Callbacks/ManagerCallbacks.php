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
		return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
	}

	public function admin_section_manager()
	{
		echo 'Manage the sections and features of this plugin';
	}

	public function checkbox_field($args): void
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$checkbox = get_option( $name );

		echo '<div class="' . $classes . '">
		<input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '>
		<label for="' . $name . '"><div></div></label></div>';
	}
}

