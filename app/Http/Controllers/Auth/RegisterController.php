<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request) 
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        $personal = new Personal();
        $personal->fullname = $request->input('fullname');
        $personal->nickname = $request->input('nickname');
        $personal->avatar = Storage::putFile('avatars', $request->file('avatar'));
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
        $personal->birth_certificate = Storage::putFile('images', $request->file('birth_certificate'));
        $personal->identity_card = Storage::putFile('images', $request->file('identity_card'));
        $personal->family_card = Storage::putFile('images', $request->file('family_card'));
        $user->personal()->save($personal);

        return redirect()->route('login.index')
            ->with('status', 'Selamat! Pendaftaran berhasil dilakukan. Mohon untuk masuk.');
    }
}
