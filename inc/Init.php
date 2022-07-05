<?php
/**
 * @package AlexDenPLugin
 */

namespace inc;

final class Init
{
	/**
	 * Store all classes inside an array
	 * @return array full list of classes
	 */
	public static function get_services(): array
	{
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
		];
	}

	/**
	 * Loop through the classes, initialize them and call register method if it exists
	 * @return
	 */
	public static function register_services()
	{
		foreach (self::get_services() as $class) {
			$service = self::instantiate($class);

			if (method_exists($service, 'register')) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize a class
	 * @param $class - class from services array
	 * @return class intanse, new instanse of the class
	 */
	private static function instantiate($class)
	{
		/*
		 * Comment for me !!!
		 * Same thing new Pages\Admin::class
		 * For each class initiate it
		 */
		return new $class;
	}
}

