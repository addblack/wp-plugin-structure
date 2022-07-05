<?php
/**
 * @package AlexDenPlugin
 */

/*
Plugin Name: Alexden Plugin
Plugin URI: https://add.black
Description: Plugin made by youtube course
Version: 1.0.0
Author: Alexey Denysiuk
Author URI: http://add.black
License: GPLv2 or later
*/

use inc\Base\Deactivate;
use inc\Base\Activate;

defined('ABSPATH') || die('Get out of here!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

function activate_alexden_plugin()
{
	Activate::activate();
}

function deactivate_alexden_plugin()
{
	Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_alexden_plugin');
register_activation_hook(__FILE__, 'deactivate_alexden_plugin');

if (class_exists('inc\Init')) {
	inc\Init::register_services();
}