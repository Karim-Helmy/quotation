<?php

namespace App\Http\Controllers\Admin;

use App\Model\Vidoes;
use Illuminate\Http\Request;
use App\Model\DiseaseCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;

class VideosController extends Controller
{
    public $path = "/assets/videos/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Vidoes::all();
        return view('admin.videos.index')
        ->with('videos', $videos)
        ->with('pageTitle', 'Videos ');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DiseaseCategories::all();
        return view('admin.videos.create')
            ->with('categories', $categories)
            ->with('pageTitle', 'Videos ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'video_url' => 'required_without:video_file',
            'video_file' => 'required_without:video_url|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:5012',
            'category' => 'required|numeric'
        ]);

        $video_name = $request->video_url;
        $video_type = 'url';

        if ($request->has('video_file')) {
            $video = $request->file('video_file');
            $video_name = rand() . "_" . rand() . "_" . $video->getClientOriginalName();
            $upload_path = public_path() . $this->path;
            $video->move($upload_path, $video_name);
            $video_type = 'file';
        }

        try {
            $video = new Vidoes();
            $video->video = $video_name;
            $video->status = $video_type;
            $video->save();
            $video->getCategory()->attach($request->category);
            return redirect()->route('videos.index')->with('status', 'added');
        } catch (QueryException $err) {
            return redirect()->back()->with('status', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Vidoes::find($id);

        if (File::exists(public_path() . $this->path . $video->video)) {
            File::delete(public_path() . $this->path . $video->video);
        }

        $video->getCategory()->detach();

        if ($video->delete()) {
            return redirect()->back()->with('status', 'delete');
        }
        return redirect()->back()->with('status', 'error');
    }
}
