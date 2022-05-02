<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Models\Product;

use App\Models\Category;

use App\Models\Photo;

use App\Models\Pdf;

use App\Models\Subcategory;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_publish', 1)->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $input = $request->except(['_token', '_method']);
        if ($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        } else {

            $input['photo_id'] = $product->photo->id;
        }

        if ($file = $request->file('pdf_id')) {
            $name = $file->getClientOriginalName();
            $file->move('documents', $name);
            $pdf = Pdf::create(['file'=>$name]);
            $input['pdf_id'] = $pdf->id;
        } else {
            $input['pdf_id'] = $product->pdf->id;
        }        

        Product::whereId($id)->update($input);

        alert()->success('Product Updated!', 'product has been updated successfully!');
        return redirect()->route('product.show', $product->id);
    }

    public function changeStatus(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->except(['_token', '_method']);

        if ($input['is_publish'] == null) {
            alert()->warning('Invalid!', 'please choose valid product status');
            return redirect()->route('product.show', $product->id);
        }

        $product->update($input);

        if ($product->is_publish == 1) {
            alert()->success('Product Approved!', 'product has been approved successfully');
        } else {
            alert()->warning('Product Unapproved!', 'The product has been unapproved successfully');
        }

        return redirect()->route('product.show', $product->id);
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'photo_id' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'pdf_id' => 'required|mimes:pdf',
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'company' => 'required',
            'price' => 'required',
        ]);

        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        if ($file = $request->file('pdf_id')) {
            $name = $file->getClientOriginalName();
            $file->move('documents', $name);
            $pdf = Pdf::create(['file'=>$name]);
            $input['pdf_id'] = $pdf->id;
        }

        Product::create($input);

        alert()->success('Product Created!', 'product has been created successfully');
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path() . $product->photo->file);
        unlink(public_path() . $product->pdf->file);
        $product->delete();
        alert()->success('Deleted!', 'the product has been deleted successfully');
        return redirect()->route('product.index');
    }

    public function getUnapproveProducts()
    {
        $unapprove_products = Product::where('is_publish', 0)->get();
        return view('admin.products.unapprove_products', compact('unapprove_products'));
    }
}
