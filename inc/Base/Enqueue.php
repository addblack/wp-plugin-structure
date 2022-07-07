<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

use inc\Base\BaseController;

/**
 * Class Enqueue
 */
class Enqueue extends BaseController
{
	public function register()
	{
		add_action('admin_enqueue_scripts', [$this, 'enqueue']);
	}

	public function enqueue()
	{
		// add scripts
		wp_enqueue_style('alexdenstyles', $this->plugin_url . '/assets/main.css', [], false, 'all');
		wp_enqueue_script('alexdenscripts', $this->plugin_url . '/assets/main.js', [], false, 'all');
	}

}