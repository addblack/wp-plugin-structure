<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\SettingsApi;

class MembershipController
{
	public $callbacks;

	public $subpages = [];

	public function register()
	{
		$option = get_option( 'alexdenplugin' );
		$activated = isset($option['membership_manager']) ? $option['membership_manager'] : false;

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
			'page_title' => 'MemberShip',
			'menu_title' => 'Membership',
			'capability' => 'manage_options',
			'menu_slug' => 'membership',
			'callback' => [$this->callbacks, 'membership_dashboard'],
		],
		];
	}

}