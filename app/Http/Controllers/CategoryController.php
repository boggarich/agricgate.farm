<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //
    public function index() {

        $categories = Category::all();

        return view('admin.categories.index', ['categories' => $categories]);

    }

    public function create() {

        return view('admin.categories.create');

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'title' => ['required', 'unique:categories,title'],
            'featured_img_url' => ['required']
        ]);

        Category::create($validated);

        return redirect()
                ->route('admin.categories.index')
                ->withSuccess('Category created successfully.');

    }

    public function edit($id) {

        $category = Category::findOrFail($id);

        return view('admin.categories.edit', ['category' => $category]);

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'title' => ['required', Rule::unique('categories')->ignore($id)],
            'featured_img_url' => ['required']
        ]);

        Category::where('id', $id)->update($validated);

        return redirect()->route('admin.categories.index')
                        ->withSuccess('Category updated successfully.');

    }

    public function destroy($id) {

        Category::find($id)->delete();

        return redirect()->route('admin.categories.index')
                            ->withSuccess('Category deleted successfully.');

    }

}
