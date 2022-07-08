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
class Admin extends BaseController
{
	public $pages = [];
	public $subpages = [];

	public $settings;
	public $callbacks;
	public $callbacks_manager;

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();
		$this->callbacks_manager = new ManagerCallbacks();

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
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'cpt_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'taxonomy_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'media_widget',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'gallery_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'testimonial_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'templates_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'login_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'membership_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
			[
				'option_group' => 'alexden_plugin_settings',
				'option_name' => 'chat_manager',
				'callback' => [$this->callbacks_manager, 'checkbox_sanitize'],
			],
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
		$args = [
			[
				'id' => 'cpt_manager',
				'title' => 'Activate CPT Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'cpt_manager',
					'class' => 'ui-toggle'
				],
			],
			[
				'id' => 'taxonomy_manager',
				'title' => 'Taxonomy Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'taxonomy_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'media_widget',
				'title' => 'Media Widget Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'media_widget',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'gallery_manager',
				'title' => 'Gallery Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'gallery_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'gallery_manager',
				'title' => 'Gallery Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'gallery_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'testimonial_manager',
				'title' => 'Gallery Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'testimonial_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'templates_manager',
				'title' => 'Templates Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'templates_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'login_manager',
				'title' => 'Login Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'login_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'membership_manager',
				'title' => 'Membership Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'membership_manager',
					'class' => 'ui-toggle'
				]
			],
			[
				'id' => 'chat_manager',
				'title' => 'Chat Manager',
				'callback' => [$this->callbacks_manager, 'checkbox_field'],
				'page' => 'alexdenplugin',
				'section' => 'alexden_admin_index',
				'args' => [
					'label_for' => 'chat_manager',
					'class' => 'ui-toggle'
				]
			],
		];

		$this->settings->set_fields($args);
	}

}