<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.table', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $position = Category::max('position') + 1;
        return view('admin.category.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:40|unique:categories',
            'position' => 'required|max:18|numeric|min:1',
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->slug = str()->slug($request->title);
        $category->position = $request->position;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->save();
        toast('Category Created Successfully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:40|unique:categories,title,'.$id,
            'position' => 'required|max:18|numeric|min:1',
            'visible' => 'required|in:0,1',
        ]);
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = str()->slug($request->title);
        $category->position = $request->position;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->visible = $request->visible;
        $category->save();
        toast('Category Updated Successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        toast('Category Deleted Successfully', 'success');
        return redirect()->back();
    }
}
