<?php
/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();

		if(get_option( 'alexdenplugin ')) {
		    return;
        }

		$default = [];

        update_option('alexdenplugin', $default);

	}
}