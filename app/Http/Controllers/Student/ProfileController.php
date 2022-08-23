<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\AvatarRequest;
use App\Http\Requests\Student\ProfileRequest;
use App\Models\Personal;
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

        return view('student.profile', compact('user'));
    }

    /**
     * Update avatar with specific id.
     *
     * @param  \App\Http\Requests\Student\AvatarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatar(AvatarRequest $request, Personal $personal)
    {
        $personal = Personal::find($personal->id);
        Storage::delete($personal->avatar);
        $personal->avatar = Storage::putFile('avatars', $request->file('avatar'));
        $personal->save();

        return back()->with('status', 'Pas foto berhasil diperbarui.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Student\ProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Personal $personal)
    {
        $user = User::find(Auth::user()->id);
        if ($request->filled('password')) {
            $user->password = $request->input('password');            
            $user->save();
        }

        $personal = Personal::find($personal->id);
        $personal->fullname = $request->input('fullname');
        $personal->nickname = $request->input('nickname');
        $personal->gender = $request->input('gender');
        $personal->place_of_birth = $request->input('place_of_birth');
        $personal->date_of_birth = $request->input('date_of_birth');
        $personal->religion = $request->input('religion');
        $personal->everyday_language = $request->input('everyday_language');
        $personal->body_height = $request->input('body_height');
        $personal->body_weight = $request->input('body_weight');
        $personal->address = $request->input('address');
        $personal->distance = $request->input('distance');
        $personal->father_name = $request->input('father_name');
        $personal->mother_name = $request->input('mother_name');
        $personal->father_education = $request->input('father_education');
        $personal->mother_education = $request->input('mother_education');
        $personal->father_job = $request->input('father_job');
        $personal->mother_job = $request->input('mother_job');
        $personal->father_age = $request->input('father_age');
        $personal->mother_age = $request->input('mother_age');
        $personal->education_category = $request->input('education_category');
        $personal->other_choice = $request->input('other_choice');
        if ($request->filled('birth_certificate')) {
            Storage::delete($personal->birth_certificate);
            $personal->birth_certificate = Storage::putFile('images', $request->file('birth_certificate'));
        }
        if ($request->filled('identity_card')) {
            Storage::delete($personal->identity_card);
            $personal->identity_card = Storage::putFile('images', $request->file('identity_card'));
        }
        if ($request->filled('family_card')) {
            Storage::delete($personal->family_card);
            $personal->family_card = Storage::putFile('images', $request->file('family_card'));
        }
        if ($request->filled('school_certificate')) {
            Storage::delete($personal->school_certificate);
            $personal->school_certificate = Storage::putFile('images', $request->file('school_certificate'));
        }
        $user->personal()->save($personal);

        return back()->with('status', 'Data diri berhasil diperbarui.');
    }
}
