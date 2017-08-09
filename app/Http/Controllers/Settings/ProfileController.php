<?php

namespace App\Http\Controllers\Settings;

use App\Domain\Models\User\Avatar\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $me = \Auth::user();

        return view('settings.profile')->with(compact('me'));
    }

    /**
     * @param \App\Http\Requests\Settings\UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        $attributes = $request->only('display_name', 'avatar', 'description');

        \Auth::user()->update($attributes);

        return redirect()->back();
    }
}
