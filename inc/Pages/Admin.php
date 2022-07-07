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

		$this->set_settings();
		$this->set_sections();
		$this->set_fields();

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
			'callback' => [$this->callbacks, 'cpt_dashboard'],
		],
			[
				'parent_slug' => 'alexdenplugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'alexden_taxes',
				'callback' => [$this->callbacks, 'taxes_dashboard'],
			],
			[
				'parent_slug' => 'alexdenplugin',
				'page_title' => 'Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'alexden_widgets',
				'callback' => [$this->callbacks, 'widgets_dashboard'],
			],
		];
	}

	public function set_settings()
	{
		$args = [
			[
				'option_group' => 'alexden_options_group',
				'option_name' => 'text_example',
				'callback' => [$this->callbacks, 'alexden_options_group'],
			],
			[
				'option_group' => 'alexden_options_group',
				'option_name' => 'first_name',
			],
		];

		$this->settings->set_settings($args);
	}

	public function set_sections()
	{
		$args = [
			[
				'id' => 'alexden_admin_index',
				'title' => 'Settings',
				'callback' => [$this->callbacks, 'alexden_admin_section'],
				'page' => 'alexdenplugin',
			],
		];

		$this->settings->set_sections($args);
	}

	public function set_fields()
	{
		$args = [
			[
				'id' => 'text_example',
				'title' => 'Text example',
				'callback' => [$this->callbacks, 'alexden_text_example'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'text_example',
					'class' => 'example_class'
				]
			],
			[
				'id' => 'first_name',
				'title' => 'First name',
				'callback' => [$this->callbacks, 'alexden_firstname'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'first_name',
					'class' => 'first_name'
				]
			],
		];

		$this->settings->set_sections($args);
	}

}