<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\SettingsApi;

class GalleryController extends BaseController
{
	public $callbacks;

	public $subpages = [];

	public function register()
	{
		if (!$this->activated('gallery_manager')) {
			return;
		}

		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();

		$this->set_sub_pages();

		$this->settings->add_subpages($this->subpages)->register();

		add_action('init', [$this, 'activate']);
	}


	public function activate()
	{

	}

	public function set_sub_pages()
	{
		$this->subpages = [[
			'parent_slug' => 'alexdenplugin',
			'page_title' => 'Gallery',
			'menu_title' => 'Gallery',
			'capability' => 'manage_options',
			'menu_slug' => 'gallery',
			'callback' => [$this->callbacks, 'gallery_dashboard'],
		],
		];
	}

}