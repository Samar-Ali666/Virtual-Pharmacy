<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Pdf;
use App\Models\Photo;
use Auth;
use DataTables;
use Str;

class StaffProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('staff.products.add_product', compact('categories', 'subcategories'));
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

        if ($input['staff_id'] != Auth::user()->id) {
            alert()->error('Something Went Wrong!', 'The product creation failed');
            return redirect()->back();
        } else {
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

        alert()->success('Approval Pending!', 'product has been waiting for approval');
        return redirect()->back();
        }
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('staff.products.product_details', compact('product'));
    }

    public function pendingProducts(Request $request)
    {
        $pending_products = Product::where('is_publish', 0)->where('staff_id', Auth::user()->id)->with('category')->with('subcategory')->with('photo')->with('pdf')->get();

        if ($request->ajax()) {
            $allPendingProducts = DataTables::of($pending_products)
            ->addIndexColumn()
            ->editColumn('photo', function($pending_products) {
                return '<img src="'.$pending_products->photo->file.'" height="50px" alt="">'; 
            })
            ->editColumn('category', function($pending_products) {
                return $pending_products->category->name;
            })
            ->editColumn('subcategory', function($pending_products) {
                return $pending_products->subcategory->name;
            })
            ->editColumn('pdf', function($pending_products) {
                return '<a href="'.$pending_products->pdf->file.'">Description</a>';
            })
            ->editColumn('is_publish', function($pending_products) {
                return '<span class="badge badge-warning">Pending</span>';
            })
            ->editColumn('created_at', function($pending_products) {
                return $pending_products->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function($pending_products) {
                return $pending_products->updated_at->diffForHumans();
            })
            ->addColumn('action', function($pending_products) {
                return '<a href="products-details/'.$pending_products->id.'" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>';
            })
            ->rawColumns(['action', 'photo',  'pdf', 'is_publish'])
            ->make(true);

            return $allPendingProducts;
        }

        return view('staff.products.pending_products', compact('pending_products'));
    }

    public function approvedProducts()
    {
        $approved_products = Product::where('is_publish', 1)->where('staff_id', Auth::user()->id)->get();

        return view('staff.products.approved_products', compact('approved_products'));
    }
}
