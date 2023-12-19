<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        return view('admin.products.list');
    }
    public function create(){
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }
    public function save(){
        return request()->all();
    }
}
