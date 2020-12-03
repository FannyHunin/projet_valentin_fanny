<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avatarData = Avatar::all();
        return view('pages.create_avatar', compact('avatarData'));
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
            'name'=>'required|min: 1|max: 30',
            'src'=>'required',
        ]);
        $avatarCount = count(Avatar::all());
        if ($avatarCount < 5) {
            $newAvatar = new Avatar;
            $newAvatar->name = $request->name;
            $newAvatar->src = $request->file('src')->hashName();
            $request->file('src')->storePublicly('images', 'public');
            $newAvatar->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('status', 'You may not create more than 5 Avatars !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newAvatar = Avatar::find($id);
        return view('pages.edit_avatar', compact('newAvatar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newAvatar = Avatar::find($id);
        $newAvatar->name = $request->name;
        Storage::disk('public')->delete('images/'.$newAvatar->src);
        $newAvatar->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('images', 'public');
        $newAvatar->save();
        return redirect('create_avatar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newAvatar = Avatar::find($id);
        $newAvatar->delete();
        Storage::disk('public')->delete('images/'.$newAvatar->src);
        return redirect()->back();
    }
}
