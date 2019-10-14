<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ClassController extends Controller
{
    /**
     * Show interface.
     *
     * @param \App\Models\Project $project
     * @param \App\Models\ClassModel $class
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project, ClassModel $class)
    {
        return $this->view(
            'web.class.show',
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
                    'title' => __('attributes.project') . ": $project->name",
                    'url'   => route('projects.show', $project)
                ],
                [
                    'title' => __('attributes.class') . ": $class->name"
                ]
            ]
        )->with(compact('project', 'class'));
    }

    /**
     * Returns class functions.
     *
     * @param \App\Models\Project $project
     * @param \App\Models\ClassModel $class
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function functionsDatatable(Project $project, ClassModel $class)
    {
        $query = $class->functions();

        return DataTables::eloquent($query)
            ->make(true);
    }
}
