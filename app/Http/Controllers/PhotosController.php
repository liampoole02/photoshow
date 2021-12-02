<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create(int $albumId){
        return view('photos.create')->with('albumId', $albumId);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' =>'required',
            'description' => 'required',
            'photo' => 'required|image'
        ]);

        $filenamewithExtention=$request->file('photo')->getClientOriginalName();

        $filename=pathinfo($filenamewithExtention, PATHINFO_FILENAME);

        $extension=$request->file('photo')->getClientOriginalExtension();

        $filenameToStore=$filename . '_' . time() . '.' . $extension;

        $path=$request->file('photo')->storeAs('public/albums/' . $request->input('album-id'), $filenameToStore);

        $photo=new Photo();
        $photo->title=$request->input('title');
        $photo->description=$request->input('description');
        $photo->photo=$filenameToStore;
        $photo->size=$request->file('photo')->getSize();
        $photo->album_id=$request->input('album-id');
        $photo->save();

        return redirect('/albums/' . $request->input('album-id'))->with('success', 'Photo uploaded successfully');
    }
}
