<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $req)
    {

        $data = $req->validated();

        $image = $req->image;

        $newImageName = time() . '-' . $image->getClientOriginalName();

        $image->storeAs('blogs', $newImageName, 'public');

        $data['image'] = $newImageName;

        $data['user_id'] = Auth::user()->id;

        Blog::create($data);

        return back()->with('blog-status', 'Your Blog Has Been Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth()->user()->id) {
            $categories = Category::get();
            return view('theme.blogs.edit', compact('categories', 'blog'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $req, Blog $blog)
    {
        if ($blog->user_id == Auth()->user()->id) {

            $data = $req->validated();


            if ($req->hasFile('image')) {
                $image = $req->image;

                Storage::delete("public/blogs/$blog->image");

                $newImageName = time() . '-' . $image->getClientOriginalName();

                $image->storeAs('blogs', $newImageName, 'public');

                $data['image'] = $newImageName;
            }

            $blog->update($data);

            return back()->with('blog-status', 'Your Blog Has Been Updated Successfully!');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id == Auth()->user()->id) {
            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return back()->with('delete-status', 'Your blog has been deleted successfully');
        }
        abort(403);
    }

    public function myBlogs()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);
        return view('theme.blogs.my-blogs', compact('blogs'));
    }
}
