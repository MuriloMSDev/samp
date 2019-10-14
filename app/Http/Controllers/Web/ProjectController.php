<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Show interface.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project)
    {
        return $this->view(
            'web.project.show',
            [
                'title'    => $project->name,
                'subTitle' => $project->language->name
            ],
            [
                [
                    'title' => __('attributes.home'),
                    'url'   => route('home')
                ],
                [
                    'title' => __('attributes.project') . ": $project->name"
                ]
            ]
        )->with(compact('project'));
    }

    /**
     * Returns project classes.
     *
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function classesDatatable(Project $project)
    {
        $query = $project->classes();

        return DataTables::eloquent($query)
            ->make(true);
    }
}
