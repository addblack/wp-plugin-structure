<?php

namespace inc\Pages;

/**
 * Class AdminPages
 */
class Admin
{
	public function register()
	{
		add_action('admin_menu', [$this, 'add_admin_pages']);
	}

	public function add_admin_pages()
	{
		add_menu_page('AlexDen PLugin', 'AlexDen', 'manage_options',
			'alexdenplugin', [$this, 'admin_page_html'], 'dashicons-image-filter', 110);

	}

	public function admin_page_html()
	{
		require_once PLUGIN_PATH . '/templates/admin.php';
	}
}