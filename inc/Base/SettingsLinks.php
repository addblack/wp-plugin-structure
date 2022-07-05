<?php

namespace inc\Base;

/**
 * Class SettingsLinks
 */
class SettingsLinks
{
	public function register()
	{
		add_filter('plugin_action_links_' . PLUGIN, [$this, 'settings_link']);
	}

	public function settings_link($links)
	{
		$settings_link = '<a href="admin.php?page=alexdenplugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
	}

}