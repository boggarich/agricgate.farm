<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index() 
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', [ 'blogs' => $blogs ]);
    }

    public function show($blog) {

        $blog = Blog::findOrFail($blog);

        return view('frontend.blog')->with('course', $blog);

    }

    public function create() {

        return view('admin.blogs.create');

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'blog' => ['required'],
            'featured_img_url' => ['required'],
        ]);

        Blog::create($validated);

        return redirect()
                ->route('admin.blogs.index')
                ->withSuccess('Blog created successfully.');

    }

    public function edit($id) {

        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', [ 'blog' => $blog ]);

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'blog' => ['required'],
            'featured_img_url' => ['nullable'],
        ]);

        Blog::where('id', $id)->update($validated);

        return redirect()->route('admin.blogs.index')
                        ->withSuccess('Blog updated successfully.');

    }

    public function destroy($id) {

        Blog::find($id)->delete();

        return redirect()->route('admin.blogs.index')
                            ->withSuccess('Blog deleted successfully.');

    }
    

}
