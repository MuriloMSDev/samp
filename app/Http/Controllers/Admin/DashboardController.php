<?php

namespace App\Http\Controllers\Admin;

use App\Charts\CountLastMonthsChart;
use App\Enums\ProjectType;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all();
        $projectsQty = $projects->count();
        $restfulQty = $projects->where('type_enum', ProjectType::RESTFUL)->count();
        $restfulPercent = ($restfulQty*100)/$projectsQty;
        $nonRestfulQty = $projects->where('type_enum', ProjectType::NON_RESTFUL)->count();
        $nonRestfulPercent = ($nonRestfulQty*100)/$projectsQty;
        $usersQty = User::count();

        $projectsChart = new CountLastMonthsChart('projects', __('attributes.projects'));
        $usersChart = new CountLastMonthsChart('users', __('attributes.users'));

        return $this->view(
            'admin.dashboard.index',
            __('attributes.dashboard')
        )->with(get_defined_vars());
    }
}
