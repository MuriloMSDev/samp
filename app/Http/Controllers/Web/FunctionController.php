<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\FunctionModel;
use App\Models\Project;

class FunctionController extends Controller
{
    /**
     * Show interface.
     *
     * @param \App\Models\Project $project
     * @param \App\Models\ClassModel $class
     * @param \App\Models\FunctionModel $function
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project, ClassModel $class, FunctionModel $function)
    {
        return $this->view(
            'web.function.show',
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
                    'title' => __('attributes.class') . ": $class->name",
                    'url'   => route('projects.classes.show', [$project, $class])
                ],
                [
                    'title' => __('attributes.function') . ": $function->name",
                ]
            ]
        )->with(compact('project', 'class', 'function'));
    }
}
