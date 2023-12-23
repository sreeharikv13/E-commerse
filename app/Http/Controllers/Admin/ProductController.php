<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSaveRequest;
use App\Product;

class ProductController extends Controller
{
    public function list(){
        $products = Product::paginate(5);
        return view('admin.products.list',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }
    public function save(ProductSaveRequest $request){
        $input = $request->validated();
        Product::create($input);
        return redirect()->route('admin.product.list')-with('message','Product saved successfully');
    }
    public function delete($id){
    $product = product::find(decrypt($id));
    $product->delete();
    return redirect()->route('admin.product.list')->with('message','Product deleted successfully');
    }
}
