<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function create()
    {
        $categories = category::all();
        return view('Admin.product.createproduct', compact('categories'));
    }

    public function storeproduct(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();
            $request->image->move(public_path("AdminAssets/product-image"), $imageName);
            $dataform = $request->all();
            $dataform['image'] = $imageName;

            product::create($dataform);
            alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
            return redirect()->route('account.product.products');
        }
    }

    public function products()
    {
        $products = product::all();
        return view('Admin.product.products', compact('products'));
    }
}
