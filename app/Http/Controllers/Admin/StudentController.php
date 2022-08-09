<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Personal::class, 'personal');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'student')
            ->orderBy('created_at')
            ->get();

        return view('admin.student.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        $user = User::find($personal->user_id);

        return view('admin.student.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Personal $personal)
    {
        $personal = Personal::find($personal->id);
        $personal->status = $request->input('status');
        $personal->save();

        return back()->with('status', 'Data calon siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        $user = User::find($personal->user_id);
        Storage::delete($user->personal->avatar);
        Storage::delete($user->personal->birth_certificate);
        Storage::delete($user->personal->identity_card);
        Storage::delete($user->personal->family_card);
        $user->delete();

        return back()->with('status', 'Data calon siswa berhasil dihapus.');
    }
}
