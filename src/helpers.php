<?php

if (! function_exists('env')) {
    function env($key, $default = null)
    {
        if (isset($_SERVER[$key])) {
            return $key;
        }

        return $default;
    }
}
