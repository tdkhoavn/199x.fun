<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\Admin\UpdateAvatarRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit()
    {
        Meta::setTitleSeparator('|')
            ->setTitle(config('constants.APP_FULLNAME'))
            ->prependTitle('【Admin】Thông tin tài khoản');

        $admin = Auth::user();
        return view('admin.profiles.edit', compact('admin'));
    }

    /**
     * Update general profile
     *
     * @param  \App\Http\Requests\Admin\UpdateProfileRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateGeneral(UpdateProfileRequest $request, $id)
    {
        $admin = Auth::user();
        $data  = [
            'name'     => $request->name,
            'gender'   => $request->gender,
            'birthday' => Carbon::createFromFormat('d-m-Y', $request->birthday),
        ];

        $this->__adminRepo->update($admin->id, $data);

        return redirect()->route('admin.profiles.edit');
    }

    /**
     * Upload avatar profile
     *
     * @param  \App\Http\Requests\Admin\UpdateAvatarRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(UpdateAvatarRequest $request, $id)
    {
        if ($request->hasFile('avatar')) {
            $file      = $request->file('avatar');
            $admin     = Auth::user();
            $path      = 'data' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . ($admin->id);
            $file_name = ((string) Str::uuid()) . '.' . $file->getClientOriginalExtension();
            Storage::disk('upload')->delete($path . DIRECTORY_SEPARATOR . $admin->avatar);
            $file->storeAs($path, $file_name, 'upload');
            $data = [
                'avatar'    => $file_name,
                'img_mtime' => now(),
            ];
            $this->__adminRepo->update($admin->id, $data);
        }

        return redirect()->route('admin.profiles.edit');
    }
}
