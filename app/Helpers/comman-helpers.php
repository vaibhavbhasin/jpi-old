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
        $n =number_format($price, $d, $s, $t);
        return sprintf('%s %s', $symbol,$n);
    }
}


if (!function_exists('amount')) {
    function amount($d, $double = false)
    {
        $n = ($double) ? number_format(($d * 2), 2) : number_format($d, 2);
        return sprintf('<b>&#8377; %s</b>', $n);
    }
}
