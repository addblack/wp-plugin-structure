<?php
/**
 * @package AlexDenPlugin
 */

namespace inc\Base;

class Deactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}