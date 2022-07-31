<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\SettingsApi;
use LiteSpeed\Base;

class ChatController extends BaseController
{
	public $callbacks;

	public $subpages = [];

	public function register()
	{

		if (!$this->activated('chat_manager')) {
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
			'page_title' => 'Chat',
			'menu_title' => 'Chat',
			'capability' => 'manage_options',
			'menu_slug' => 'chat',
			'callback' => [$this->callbacks, 'chat_dashboard'],
		],
		];
	}

}