<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{   
    public function index() 
    {
        $galleries = Gallery::all();

        return view('gallery.index',compact('galleries')); 
    }

    public function getApi() {
        $galleries = Gallery::all();

        return response()->json($galleries);
    }

    public function store(Request $request) {

        $gallery = new Gallery;

        $gallery->gallery_name = $request->name;
        $gallery->gallery_url = $request->redirect;
        $gallery->gallery_tag = 'tag';
        $gallery->user_id = 1;

        $gallery->save();

        return response()->json([
            'code' => 200, 
            'status' => 'OK', 
            'data' => $request->all()
        ]);
    }

    public function update($id, Request $request) {

        $update = Gallery::where('gallery_id',$id)->update([
    		'gallery_name' => $request->name,
    		'gallery_url' => $request->redirect,
    	]);

        return response()->json([
            'code' => 200, 
            'status' => 'OK', 
            'data' => $request->all()
        ]);
    }

    public function destroy($id) {

        $delete = Gallery::where('gallery_id',$id)->delete();

        return response()->json([
            'code' => 200, 
            'status' => 'OK', 
            'data' => []
        ]);
    }
}
