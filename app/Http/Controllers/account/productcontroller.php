<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function create(){
        $categories=category::all();
        return view('Admin.product.createproduct',compact('categories'));
    }
}
