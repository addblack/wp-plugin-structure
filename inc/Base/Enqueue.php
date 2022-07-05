<?php

namespace inc\Base;

/**
 * Class Enqueue
 */
class Enqueue
{
	public function register()
	{
		add_action('admin_enqueue_scripts', [$this, 'enqueue']);
	}

	public function enqueue()
	{
		// add scripts
		wp_enqueue_style('alexdenstyles', PLUGIN_URL . '/assets/main.css', [], false, 'all');
		wp_enqueue_script('alexdenscripts', PLUGIN_URL . '/assets/main.js', [], false, 'all');
	}

}