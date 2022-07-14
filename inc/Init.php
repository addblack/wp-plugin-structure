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
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CPTController::class,
            Base\TaxonomyController::class,
            Base\WidgetController::class,
            Base\GalleryController::class,
            Base\TestimonialController::class,
            Base\TemplatesController::class,
            Base\LoginController::class,
            Base\MembershipController::class,
            Base\ChatController::class,
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

