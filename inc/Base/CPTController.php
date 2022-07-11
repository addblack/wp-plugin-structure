<?php

/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

use inc\Api\Callbacks\AdminCallbacks;
use inc\Api\SettingsApi;
use inc\Base\BaseController;

class CPTController extends BaseController
{
    public $callbacks;

    public $subpages = [];

    public function register()
    {

        $option = get_option( 'alexdenplugin' );
        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

        if($activated) {
            $this->settings = new SettingsApi();
            $this->callbacks = new AdminCallbacks();

            $this->set_sub_pages();

            $this->settings->add_subpages($this->subpages)->register();

            add_action('init', [$this, 'activate']);
        }
    }

    public function activate()
    {
        register_post_type('alexden_products', [
            'labels' => [
                'name' => 'Products',
                'singular_name' => 'Product',
            ],
            'public' => true,
            'has_arhive' => true
        ],
        );
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
        ];
    }

}
