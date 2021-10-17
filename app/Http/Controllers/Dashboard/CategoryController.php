<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\BlogsCollection;
use App\Http\Resources\BlogsResource;
use App\Http\Resources\CategoryResource;
use App\Models\Dashboard\Blog;
use App\Models\Dashboard\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(Category::orderBy('created_at', 'desc')->paginate(10));
    }


    public function create()
    {
    }


    public function store(StoreCategoryRequest $request)
    {
        $cat = new Category;
        if ($request->hasFile('thumbnail'))
            $file = $request->thumbnail;

        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->save();

        return new CategoryResource($cat);
    }


    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function edit(Category $category)
    {
        //
    }


    public function update(StoreCategoryRequest $request, Category $category)
    {

        if ($request->hasFile('thumbnail'))
            $file = $request->thumbnail;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return new CategoryResource($category);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
    public function filter($category)
    {
        $categoryBlogs = DB::table('blogs_categories')->where('category_id', $category)->get('blog_id');
        $idsOfBlogs = [];
        foreach ($categoryBlogs as  $blog) {
            array_push($idsOfBlogs, $blog->blog_id);
        }
        $blogs = Blog::whereIn('id', $idsOfBlogs)->get();
        return new BlogsCollection($blogs);
    }
}
