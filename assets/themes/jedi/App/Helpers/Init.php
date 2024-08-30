<?php

namespace App\Helpers;

class Init
{

    public function __construct()
    {
        add_filter('body_class', [self::class, 'add_class_for_body']);

        add_filter('acf/load_value/type=text', [self::class, 'text_shortcode'], 10, 3);

        add_shortcode('current_year', [self::class, 'get_current_year']);
    }

    public static function add_class_for_body($classes)
    {
        $classes[] = 'page';

        return $classes;
    }

    public static function text_shortcode($value)
    {
        if (is_admin()) return $value;
        return do_shortcode($value);
    }

    public static function get_current_year()
    {
        $year = date('Y');
        return $year;
    }
}
