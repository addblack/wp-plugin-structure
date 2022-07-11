<?php
/**
 * @package AlexDenPlugin
 */

namespace inc\Pages;

use inc\Api\SettingsApi;
use inc\Base\BaseController;
use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\Callbacks\ManagerCallbacks;

/**
 * Class AdminPages
 */
class Dashboard extends BaseController
{
	public $pages = [];
//	public $subpages = [];

	public $settings;
	public $callbacks;
	public $callbacks_manager;

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();
		$this->callbacks_manager = new ManagerCallbacks();

		$this->set_pages();
//		$this->set_sub_pages();

		$this->set_settings();
		$this->set_sections();
		$this->set_fields();

		$this->settings->add_pages($this->pages)->with_sub_page('Dashboard')->register();
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

//	public function set_sub_pages()
//	{
//		$this->subpages = [[
//			'parent_slug' => 'alexdenplugin',
//			'page_title' => 'Custom post types',
//			'menu_title' => 'CPT',
//			'capability' => 'manage_options',
//			'menu_slug' => 'alexden_cpt',
//			'callback' => [$this->callbacks, 'cpt_dashboard'],
//		],
//			[
//				'parent_slug' => 'alexdenplugin',
//				'page_title' => 'Custom Taxonomies',
//				'menu_title' => 'Taxonomies',
//				'capability' => 'manage_options',
//				'menu_slug' => 'alexden_taxes',
//				'callback' => [$this->callbacks, 'taxes_dashboard'],
//			],
//			[
//				'parent_slug' => 'alexdenplugin',
//				'page_title' => 'Widgets',
//				'menu_title' => 'Widgets',
//				'capability' => 'manage_options',
//				'menu_slug' => 'alexden_widgets',
//				'callback' => [$this->callbacks, 'widgets_dashboard'],
//			],
//		];
//	}

	public function set_settings()
	{
		$args = [
		    [
                'option_group' => 'alexden_plugin_settings',
                'option_name' => 'alexdenplugin',
                'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
            ]
		];

		$this->settings->set_settings($args);
	}

	public function set_sections()
	{
		$args = [
			[
				'id' => 'alexden_admin_index',
				'title' => 'Settings Manager',
				'callback' => [$this->callbacks_manager, 'admin_section_manager'],
				'page' => 'alexdenplugin',
			],
		];

		$this->settings->set_sections($args);
	}

	public function set_fields()
	{
		$args = [];

		foreach ($this->managers as $key => $value) {
			$args[] = [
				'id' => $key,
				'title' => 'Activate ' . $value,
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'option_name' => 'alexdenplugin',
					'label_for' => $key,
					'class' => 'ui-toggle'
				]
			];
		}

		$this->settings->set_fields($args);
	}
}