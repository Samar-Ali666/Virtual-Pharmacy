<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subcategory;

class AdminSubcategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $input = $request->all();

        Subcategory::create($input);

        alert()->success('Subcategory Added!', 'subcategory has been created successfully');

        return redirect()->back();
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $subcategories = Subcategory::where('category_id', $subcategory->category->id)->get();

        return view('admin.category.subcategory.edit', compact('subcategory', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->except(['_token', '_method']);

        Subcategory::whereId($id)->update($input);

        alert()->success('Subcategory Updated!', 'subcategory has been updated successfully');

        return redirect()->route('category.show', $subcategory->category->id);
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->delete(); 

        alert()->success('Deleted!', 'The subcategory has been deleted successfully');

        return redirect()->back(); 
    }
}
