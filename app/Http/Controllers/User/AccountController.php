<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AccountRequest;

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
            __('attributes.my_account')
        )->with(compact('user'));
    }

    /**
     * Update interface.
     *
     * @param \App\Http\Requests\User\AccountRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AccountRequest $request)
    {
        user()->update($request->all());

        flash(__('messages.record.update_success'))->success();
        return redirect(route('user.account.edit'));
    }
}
