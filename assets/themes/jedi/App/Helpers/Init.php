<?php

namespace App\Helpers;

class Init
{

    public function __construct()
    {
        add_filter('body_class', [self::class, 'add_class_for_body']);
    }

    public static function add_class_for_body($classes)
    {
        $classes[] = 'page';

        return $classes;
    }
}
