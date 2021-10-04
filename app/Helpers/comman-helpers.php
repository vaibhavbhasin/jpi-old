<?php
if (!function_exists('preQuailStatus')) {
    function preQuailStatus($key = null)
    {
        $status = [
            '1' => 'Started',
            '2' => 'Submitted',
            '3' => 'Approved',
            '4' => 'Pending',
            '5' => 'Rejected',
            '6' => 'Requalify'
        ];
        return $key === null ? $status : $status[$key] ?? 'Unknown';
    }
}
if (!function_exists('price')) {
    function price($price, $symbol = '$', $d = 2, $s = '.', $t = ','): string
    {
        $n = number_format($price, $d, $s, $t);
        return sprintf('%s %s', $symbol, $n);
    }
}


if (!function_exists('amount')) {
    function amount($d, $double = false): string
    {
        $n = ($double) ? number_format(($d * 2), 2) : number_format($d, 2);
        return sprintf('<b>&#8377; %s</b>', $n);
    }
}

if (!function_exists('menuIcon')) {
    function menuIcon($icon): string
    {
        $icon_array = explode('.', $icon);
        if (count($icon_array) === 2) {
            return sprintf("<img src='%s' class='sidebar-icon-svg'/>", asset('menu-icon/' . $icon));
        } else {
            return "<i class='material-icons'>{$icon}</i>";
        }
        return '';
    }
}

if (!function_exists('is_active')) {
    function is_active($value, $segment = 1)
    {
        if (isset($value->href_type) && $value->href_type === 'route') {
            $all_segments = explode('/', Route::current()->uri());
            $route = str_replace(URL::to('/') . '/', '', route($value->url));
            if (isset($all_segments[$segment])) {
                ray(Str::singular($route. '*'));
                return (request()->is($route . '*')) ? 'active' : '';
            } else {
                return (Route::current()->getName() === $value->url) ? 'active' : '';
            }
        } else {
            ray($value->url);
            return (request()->is($value->url . '*')) ? 'active' : '';
        }


        /*
        if (!is_array($value)) {
            return request()->segment($segment) == $value ? 'active' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v) return 'active';
        }*/
    }
}

