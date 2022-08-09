<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AvatarRequest;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('admin.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        if ($request->filled('password')) {
            $user->password = $request->input('password');
        }
        $user->save();

        return back()->with('status', 'Data diri berhasil diperbarui.');
    }

    /**
     * Update avatar with specific id.
     *
     * @param  \App\Http\Requests\Admin\AvatarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatar(AvatarRequest $request, User $user)
    {
        $user = User::find($user->id);
        if (!$user->avatar === 'default.jpg') {
            Storage::delete($user->avatar);
        }
        $user->avatar = Storage::putFile('avatars', $request->file('avatar'));
        $user->save();

        return back()->with('status', 'Foto diri berhasil diperbarui.');
    }
}
