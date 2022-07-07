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

defined('ABSPATH') || die('Get out of here!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate_alexden_plugin()
{
	inc\Base\Activate::activate();
}

function deactivate_alexden_plugin()
{
	inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_alexden_plugin');
register_activation_hook(__FILE__, 'deactivate_alexden_plugin');

if (class_exists('inc\Init')) {
	inc\Init::register_services();
}