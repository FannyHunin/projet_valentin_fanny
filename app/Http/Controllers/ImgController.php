<?php

namespace App\Http\Controllers;

use App\Models\Img;
use App\Models\ImgGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allImg = Img::all();
        return view('pages.all_img', compact('allImg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleryData = ImgGallery::all();
        return view('pages.create_img', compact('galleryData'));
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
            'src'=>'required',
            'gallery_id'=>'required',
        ]);

        $newImg = new Img;
        $newImg->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('images', 'public');
        $newImg->gallery_id = $request->gallery_id;
        $newImg->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function show(Img $img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function edit(Img $img)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Img $img)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Img  $img
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allImg = Img::find($id);
        $allImg->delete();
        Storage::disk('public')->delete('images/'.$allImg->src);
        return redirect()->back();
    }
}
