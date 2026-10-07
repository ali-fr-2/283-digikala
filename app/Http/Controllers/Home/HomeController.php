<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productcolors;
use App\Models\ProductImage;
use App\Models\slidermodel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $products = product::all();
        $sliders = slidermodel::all();
        return view('Home.index', compact('products', 'sliders'));
    }

    public function Product($id)
    {
        $product = product::find($id);
        $productimages = ProductImage::all();
        $productcolors = productcolors::all();
        return view('home.layout.single', compact('product', 'productimages', 'productcolors'));
    }
}
