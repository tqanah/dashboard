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

      //  $sort_column = request('sort_column', 'created_at');
       // $sort_dircetion = request('sort_dircetion', 'asc');

        return  new BlogsCollection(Blog::with(['blogs_creator','categories'])->get());
    }

    public function create()
    {

        $categories = Category::all();
        return view('dashboard.blogs.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        //return $request->all();
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->time_read = $request->time_read;

        $blog->created_by = auth()->user()->id;
        $blog->updated_by = auth()->user()->id;
        $blog->save();
        $blog->categories()->sync($request->categories_id);
       // dd($request->image);
        $blog->addMediaFromRequest('image')->toMediaCollection();

        // $blog->update(['image' => $request->file('image')]);


        return redirect('/blog');
    }

    public function show($id)
    {
        $blog=Blog::find($id);
        return new BlogResource($blog);
        //return  $blog;
        //return view('dashboard.blogs.show', ['blog' => $blog]);
    }
    public function showBlog($id){

        $blog=Blog::find($id);


        return view('dashboard.blogs.show', ['blog' => $blog]);
    }
}
