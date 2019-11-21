<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountRequest;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Edit interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $admin = user('admin');
        return $this->view(
            'admin.account.edit',
            __('attributes.my_account'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('admin.dashboard')
                ],
                [
                    'title' => __('attributes.my_account')
                ]
            ]
        )->with(compact('admin'));
    }

    /**
     * Update interface.
     *
     * @param \App\Http\Requests\Admin\AccountRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AccountRequest $request)
    {
        $data = $request->all();

        if (is_null($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        user('admin')->update($data);

        flash(__('messages.record.update_success'))->success();
        return redirect(route('admin.account.edit'));
    }
}
