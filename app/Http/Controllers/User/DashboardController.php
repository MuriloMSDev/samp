<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->view(
            'user.dashboard.index',
            'Dashboard',
            [
                [
                    'title' => 'Dashboard'
                ]
            ]
        );
    }
}
