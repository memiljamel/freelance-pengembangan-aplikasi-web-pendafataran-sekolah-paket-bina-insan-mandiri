<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(News::class, 'news');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at')->get();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News();
        $news->user_id = Auth::user()->id;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->thumbnail = Storage::putFile('images', $request->file('thumbnail'));
        $news->date = $request->input('date');
        $news->save();

        return back()->with('status', 'Data berita berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $news = News::find($news->id);

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\NewsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $news = News::find($news->id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        if ($request->has('thumbnail')) {
            Storage::delete($news->thumbnail);
            $news->thumbnail = Storage::putFile('images', $request->file('thumbnail'));
        }
        $news->date = $request->input('date');
        $news->save();

        return back()->with('status', 'Data berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news = News::find($news->id);
        Storage::delete($news->thumbnail);
        $news->delete();

        return back()->with('status', 'Data berita berhasil dihapus.');
    }
}
