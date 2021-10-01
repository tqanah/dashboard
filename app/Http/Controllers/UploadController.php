<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $folder=uniqid().'_'.now()->timestamp;

            $file->storeAs('avatarBlog/'.$folder,$filename);
            return $folder;
        }
        return '' ;
    }
}
