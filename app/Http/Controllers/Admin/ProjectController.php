<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProjectType;
use App\Helpers\Arrays;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Index interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->view(
            'admin.project.index',
            __('attributes.projects'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('admin.dashboard')
                ],
                [
                    'title' => __('attributes.projects')
                ],
            ]
        );
    }

    /**
     * Returns users.
     *
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function datatable()
    {
        return DataTables::eloquent(Project::with('user')->select('projects.*'))
            ->filterColumn('type', function ($query, $keyword) {
                $keys = array_keys(
                    Arrays::search($keyword, ProjectType::toSelectArray())
                );

                $query->whereIn('projects.type_enum', $keys);
            })
            ->orderColumn("type", 'projects.type_enum $1')
            ->make(true);
    }
}
