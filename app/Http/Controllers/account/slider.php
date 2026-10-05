<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\slidermodel;
use Illuminate\Http\Request;

class slider extends Controller
{
    public function Create()
    {
        return view('admin.slider.createslider');
    }

    public function SliderImage(Request $request)
    {
        if ($request->hasFile('image')) {
            //image name
            $imagename = random_int(1000000, 9999999) . '.' . $request->image->extension();
            //image path
            $request->image->move(public_path("AdminAssets/slider-image"), $imagename);

            $dataform = $request->all();
            $dataform['image'] = $imagename;

            slidermodel::create($dataform);

            alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
            return redirect()->route('account.product.Products');
        }
    }
}
