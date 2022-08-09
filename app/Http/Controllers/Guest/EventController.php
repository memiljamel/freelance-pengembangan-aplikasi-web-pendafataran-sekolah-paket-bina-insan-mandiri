<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $news = News::orderBy('created_at')->get();

        return view('guest.news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNews($id)
    {
        $news = News::find($id);

        return view('guest.news.detail', compact('news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galleries()
    {
        $galleries = Gallery::orderBy('created_at')->get();

        return view('guest.galleries', compact('galleries'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function announcement()
    {
        $announcements = Announcement::orderBy('created_at')->get();

        return view('guest.announcement.index', compact('announcements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAnnouncement($id)
    {
        $announcement = Announcement::find($id);

        return view('guest.announcement.detail', compact('announcement'));
    }
}
