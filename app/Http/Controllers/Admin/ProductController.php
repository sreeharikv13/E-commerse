<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSaveRequest;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        
        if($request->hasFile('image')){
            $extention = $request->image->extension();
            $filename = Str::random(6)."_".time()."_product.".$extention;
            $request->image->storeAs('images',$filename);
        }
        $input['image'] = $filename;
        Product::create($input);
        return redirect()->route('admin.product.list')-with('message','Product saved successfully');
    }
    public function delete($id){
    $product = product::find(decrypt($id));
    if(!empty($product->image)){
        Storage::delete('images/'.$product->images);
    }
    $product->delete();
    return redirect()->route('admin.product.list')->with('message','Product deleted successfully');
    }
}
