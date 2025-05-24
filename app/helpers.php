<?php

use Illuminate\Support\Str;

if (! function_exists('generate_id')) {
    function generate_id($prefix = '', $length = 5) {
        return $prefix . strtoupper(Str::random($length));
    }
}
