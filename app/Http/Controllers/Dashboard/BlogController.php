<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogsCollection;
use App\Models\Dashboard\Blog;
use App\Models\Dashboard\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogController extends Controller
{
    public function index()
    {

        $sort_column = request('sort_column', 'created_at');
        $sort_dircetion = request('sort_dircetion', 'asc');

        return  new BlogsCollection(Blog::with('blogs_creator')
            ->orderBy($sort_column, $sort_dircetion)
            ->paginate(10));

    }

    public function getAllBlogs()
    {

        $sort_column = request('sort_column', 'created_at');
        $sort_dircetion = request('sort_dircetion', 'asc');

        return  new BlogsCollection(Blog::with('blogs_creator')->get());

    }

    public function create()
    {

        $categories=Category::all();
        return view('dashboard.blogs.create',['categories'=>$categories]);
    }

    public function store(Request $request)
    {

        //return $request->all();
        $blog= new Blog;
        $blog->title=$request->title;
        $blog->body=$request->body;
        $blog->created_by=auth()->user()->id;
        $blog->updated_by=auth()->user()->id;
        $blog->category_id=$request->category_id;
        $blog->save();

        $blog->addMedia($request->image)->toMediaCollection();

        //$blog->addMediaFromRequest('image')->toMediaCollection('images');

       // $blog->update(['image' => $request->file('image')]);


        return redirect('/blog');
    }

    public function show($id)
    {
        $blog=Blog::find($id);
      //  dd($id);
        return new BlogResource($blog);
      //  return  $blog;
        //return view('dashboard.blogs.show', ['blog' => $blog]);
    }
    public function showBlog($id){

        $blog=Blog::find($id);


        return view('dashboard.blogs.show', ['blog' => $blog]);
    }
}


