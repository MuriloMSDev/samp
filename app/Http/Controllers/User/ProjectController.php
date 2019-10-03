<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Tool;
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
            'user.project.index',
            __('attributes.projects'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('user.dashboard')
                ],
                [
                    'title' => __('attributes.projects')
                ],
            ]
        );
    }

    /**
     * Create interface.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Project $project)
    {
        $tools = Tool::pluck('name', 'id');
        return $this->view(
            'user.project.create',
            __('attributes.projects'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('user.dashboard')
                ],
                [
                    'title' => __('attributes.projects'),
                    'url' => route('user.projects.index')
                ],
                [
                    'title' => __('attributes.project_new'),
                ],
            ]
        )->with(compact('project', 'tools'));
    }

    /**
     * Store interface.
     *
     * @param \App\Http\Requests\ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProjectRequest $request)
    {
        $tool = Tool::findOrFail($request->tool);

        $adapter = $tool->adapter;
        $project = $adapter::build($request->all());

        if (!$project) {
            flash(__('messages.register.create_fail'))->error();
            return redirect()->back()->withInput();
        }

        $image = $request->file('image');
        if ($image) {
            $project->image()->create([
                'image'  => $image,
                'adjust' => true
            ]);
        }

        flash(__('messages.register.create_success'))->success();
        return redirect(route('user.projects.index'));
    }

    /**
     * Edit interface.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $tools = Tool::pluck('name', 'id');
        return $this->view(
            'user.project.edit',
            __('attributes.projects'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('user.dashboard')
                ],
                [
                    'title' => __('attributes.projects'),
                    'url' => route('user.projects.index')
                ],
                [
                    'title' => __('attributes.project_edit'),
                ],
            ]
        )->with(compact('project', 'tools'));
    }

    /**
     * Update interface.
     *
     * @param \App\Http\Requests\ProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update($request->all());

        $image = $request->file('image');
        if ($image) {
            if ($project->image) {
                $project->image->delete();
            }

            $project->image()->create([
                'image'  => $image,
                'adjust' => true
            ]);
        }

        flash(__('messages.register.update_success'))->success();
        return redirect(route('user.projects.index'));
    }

    /**
     * Returns user projects.
     *
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function datatable()
    {
        $query = user()->projects();

        return DataTables::eloquent($query)
            ->make(true);
    }
}
