<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountUserRequest;

class AccountController extends Controller
{
    /**
     * Edit interface.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $user = user();
        return $this->view(
            'user.account.edit',
            __('attributes.my_account'),
            [
                [
                    'title' => __('attributes.dashboard'),
                    'url' => route('user.dashboard')
                ],
                [
                    'title' => __('attributes.my_account')
                ]
            ]
        )->with(compact('user'));
    }

    /**
     * Update interface.
     *
     * @param \App\Http\Requests\AccountUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AccountUserRequest $request)
    {
        user()->update($request->all());

        flash(__('messages.register.update_success'))->success();
        return redirect(route('user.account.edit'));
    }
}
