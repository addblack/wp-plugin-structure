<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\SettingsApi;

class TaxonomyController
{
	public $callbacks;

	public $subpages = [];

	public function register()
	{

		$option = get_option( 'alexdenplugin' );
		$activated = isset($option['taxonomy_manager']) ? $option['taxonomy_manager'] : false;

		if($activated) {
			$this->settings = new SettingsApi();
			$this->callbacks = new AdminCallbacks();

			$this->set_sub_pages();

			$this->settings->add_subpages($this->subpages)->register();

			add_action('init', [$this, 'activate']);
		}
	}

	public function activate()
	{

	}

	public function set_sub_pages()
	{
		$this->subpages = [[
			'parent_slug' => 'alexdenplugin',
			'page_title' => 'Taxonomy',
			'menu_title' => 'Taxonomy',
			'capability' => 'manage_options',
			'menu_slug' => 'alexden_taxonomy',
			'callback' => [$this->callbacks, 'taxonomy_dashboard'],
		],
		];
	}

}