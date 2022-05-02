<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        Category::create($input);

        alert()->success('Category Added!', 'category has been created successfully');

        return redirect()->back();
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));   
    }

    public function edit($id)
    {
        $categories = Category::paginate(5);

        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->except(['_token', '_method']);

        Category::whereId($id)->update($input);

        alert()->success('Category Updated!', 'category has been updated successfully');

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        alert()->success('Deleted!', 'The category has been deleted successfully');

        return redirect()->route('categories.index');
    }
}
