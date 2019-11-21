<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AccountRequest;
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
        $data = $request->all();

        if (is_null($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        user()->update($data);

        flash(__('messages.record.update_success'))->success();
        return redirect(route('user.account.edit'));
    }
}
