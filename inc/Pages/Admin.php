<?php
/**
 * @package AlexDenPlugin
 */

namespace inc\Pages;

use inc\Api\SettingsApi;
use inc\Base\BaseController;
use inc\Api\Callbacks\AdminCallbacks;

/**
 * Class AdminPages
 */
class Admin extends BaseController
{
	public $pages = [];
	public $subpages = [];

	public $settings;
	public $callbacks;

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->set_pages();
		$this->set_sub_pages();

		$this->settings->add_pages($this->pages)->with_sub_page('Dashboard')->add_subpages($this->subpages)->register();
	}

	public function set_pages()
	{
		$this->pages = [[
			'page_title' => 'AlexDen Plugin',
			'menu_title' => 'AlexDen',
			'capability' => 'manage_options',
			'menu_slug' => 'alexdenplugin',
			'callback' => [$this->callbacks, 'admin_dashboard'],
			'icon_url' => 'dashicons-image-filter',
			'position' => 110
		]];
	}

	public function set_sub_pages()
	{
		$this->subpages = [[
			'parent_slug' => 'alexdenplugin',
			'page_title' => 'Custom post types',
			'menu_title' => 'CPT',
			'capability' => 'manage_options',
			'menu_slug' => 'alexden_cpt',
			'callback' => function () {
				echo '<h1>Custom post type manager</h1>';
			},
		],
			[
				'parent_slug' => 'alexdenplugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'alexden_taxes',
				'callback' => function () {
					echo '<h1>Taxonomies manager</h1>';
				},
			],
			[
				'parent_slug' => 'alexdenplugin',
				'page_title' => 'Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'alexden_widgets',
				'callback' => function () {
					echo '<h1>Widgets manager</h1>';
				},
			],
		];
	}

}