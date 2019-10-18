<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Index interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->view(
            'admin.user.index',
            __('attributes.users'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('admin.dashboard')
                ],
                [
                    'title' => __('attributes.users')
                ],
            ]
        );
    }

    /**
     * Edit interface.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(User $user)
    {
        return $this->view(
            'admin.user.edit',
            __('attributes.users'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('admin.dashboard')
                ],
                [
                    'title' => __('attributes.users'),
                    'url' => route('admin.users.index')
                ],
                [
                    'title' => __('attributes.user_edit'),
                ],
            ]
        )->with(compact('user'));
    }

    /**
     * Update interface.
     *
     * @param \App\Http\Requests\Admin\UserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        flash(__('messages.record.update_success'))->success();
        return redirect(route('admin.users.edit', compact('user')));
    }

    /**
     * Returns users.
     *
     * @return \Yajra\DataTables\Facades\DataTables
     */
    public function datatable()
    {
        return DataTables::eloquent(User::query())
            ->make(true);
    }
}
