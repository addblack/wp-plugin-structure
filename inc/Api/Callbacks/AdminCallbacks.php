<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Api\Callbacks;

use inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function admin_dashboard()
	{
		return require_once("$this->plugin_path/templates/admin.php");
	}
}

