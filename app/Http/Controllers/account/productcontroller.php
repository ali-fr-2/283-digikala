<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function create(){
        return view('Admin.product.createproduct');
    }
}
