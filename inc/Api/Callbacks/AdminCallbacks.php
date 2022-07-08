<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Api\Callbacks;

use inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function admin_dashboard()
	{
		return require_once("$this->plugin_path/templates/admin.php");
	}

	public function cpt_dashboard()
	{
		return require_once("$this->plugin_path/templates/cpt.php");
	}

	public function taxes_dashboard()
	{
		return require_once("$this->plugin_path/templates/taxes.php");
	}

	public function widgets_dashboard()
	{
		return require_once("$this->plugin_path/templates/widgets.php");
	}

//	public function alexden_options_group($input)
//	{
//		return $input;
//	}
//
//	public function alexden_admin_section()
//	{
//		echo 'This is section';
//	}

//	public function alexden_text_example()
//	{
//		$value = esc_attr( get_option('text_example'));
//		echo '<input type="text" value="' . $value . '" class="regular-text" name="text_example" placeholder="Text Example"/>';
//	}
//
//	public function alexden_firstname()
//	{
//		$value = esc_attr( get_option('first_name'));
//		echo '<input type="text" value="' . $value . '" class="regular-text" name="first_name" placeholder="Your name"/>';
//	}
}

