<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function show()
    {
        return view('admin.auth.passwords.change');
    }

    public function update(UpdatePasswordRequest $request, $id)
    {
        $admin = Auth::user();
        if (Auth::id() != $id) {
            abort(404);
        }

        $this->__adminRepo->update($admin->id, [
            'password' => bcrypt($request->new_password)
        ]);

        Auth::logout();

        return redirect()->route('admin.showLogin');
    }
}
