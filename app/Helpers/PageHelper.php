<?php

use App\Models\Page;

if (!function_exists('getPageNames')) {
    function getPageNames()
    {
        return Page::select('id','title')->get();
    }
}
