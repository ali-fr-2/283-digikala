<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\slidermodel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        $products=product::all();
        $sliders=slidermodel::all();
        return view('Home.index' , compact('products','sliders'));
    }
}
