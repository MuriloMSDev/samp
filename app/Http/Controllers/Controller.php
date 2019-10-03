<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function view($view, $title, $breadcrumb = null)
    {
        if (is_array($title)) {
            $subTitle = $title['subTitle'] ?? null;
            $title = $title['title'] ?? null;
        }
        return view($view, compact('title', 'subTitle', 'breadcrumb'));
    }
}
