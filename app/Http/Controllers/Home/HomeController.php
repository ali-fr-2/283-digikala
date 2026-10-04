<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        $products=product::all();
        return view('Home.index' , compact('products'));
    }
}
