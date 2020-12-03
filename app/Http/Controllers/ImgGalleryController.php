<?php

namespace App\Http\Controllers;

use App\Models\ImgGallery;
use Illuminate\Http\Request;

class ImgGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleryData = ImgGallery::all();
        return view('pages.create_gallery', compact('galleryData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required"
        ]);

        $newGallery = new ImgGallery;
        $newGallery->name = $request->name;
        $newGallery->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImgGallery  $imgGallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galleryData = ImgGallery::find($id);
        return view('pages.show_gallery', compact('galleryData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImgGallery  $imgGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleryData = ImgGallery::find($id);
        return view('pages.edit_gallery', compact('galleryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImgGallery  $imgGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newGallery = ImgGallery::find($id);
        $newGallery->name = $request->name;
        $newGallery->save();
        return redirect('/create_gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImgGallery  $imgGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newGallery = ImgGallery::find($id);
        $newGallery->delete();
        return redirect('/create_gallery');
    }
}
