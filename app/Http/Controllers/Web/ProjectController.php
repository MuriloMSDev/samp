<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $query = Project::query();

        if (isset($data['language'])) {
            $query = $query->whereHas('language', function ($q) use ($data) {
                $q->where('languages.id', $data['language']);
            });
        }

        if (isset($data['q'])) {
            $query = $query->where(function ($q) use ($data) {
                $q->where('name', 'like', "%{$data['q']}%")
                    ->orWhere('description', 'like', "%{$data['q']}%");
            });
        }

        if (isset($data['project_type'])) {
            $query = $query->where('type_enum', $data['project_type']);
        }

        $projects = $query->paginate(5);
        return view('web.home', compact('projects'));
    }

    /**
     * Show interface.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project)
    {
        $view = 'non-restful';
        if ($project->isRestful()) {
            $view = 'restful';
        }

        return $this->view(
            "web.project.{$view}",
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
