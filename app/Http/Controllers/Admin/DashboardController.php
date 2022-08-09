<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $students = Personal::all();
        $news = News::all();
        $announcements = Announcement::all();
        $galleries = Gallery::all();

        return view('admin.dashboard', compact('user', 'students', 'news', 'announcements', 'galleries'));
    }
}
