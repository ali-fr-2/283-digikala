<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class productcontroller extends Controller
{
    public function Create()
    {
        $categories = category::all();
        return view('Admin.product.createproduct', compact('categories'));
    }

    public function Storeproduct(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();
            $request->image->move(public_path("AdminAssets/product-image"), $imageName);
            $dataform = $request->all();
            $dataform['image'] = $imageName;

            product::create($dataform);
            alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
            return redirect()->route('account.product.Products');
        }
    }

    public function Products()
    {
        $products = product::all();
        return view('Admin.product.products', compact('products'));
    }

    public function Edit($id)
    {
        $product = product::find($id);
        $categories = category::all();
        return view('Admin.product.edit', compact('product', 'categories'));
    }

    // public function Update(Request $request, $id)
    // {
    //     $product = product::find($id);
    //     if ($request->hasFile('image')) {
    //         $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();
    //         $request->image->move(public_path("AdminAssets/product-image"), $imageName);
    //         $dataform = $request->all();
    //         $dataform['image'] = $imageName;

    //         $previouspicture = public_path("AdminAssets/product-image/" . $product->image);
    //         if (File::exists($previouspicture)) {
    //             File::delete($previouspicture);
    //         }

    //         $product->update($dataform);
    //         alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
    //         return redirect()->route('account.product.Products');
    //     }
    // }

    //اگه عکس جدید هم انتخاب نکنی این کار میکنه
    public function Update(Request $request, $id)
    {
        $product = product::find($id);

        $dataform = $request->all();

        if ($request->hasFile('image')) {

            $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();

            $request->image->move(
                public_path("AdminAssets/product-image"),
                $imageName
            );

            $previouspicture = public_path(
                "AdminAssets/product-image/" . $product->image
            );

            if (File::exists($previouspicture)) {
                File::delete($previouspicture);
            }

            $dataform['image'] = $imageName;
        }

        $product->update($dataform);

        alert()->success('موفق!', 'عملیات با موفقیت انجام شد');

        return redirect()->route('account.product.Products');
    }

    public function DELETE($id)
    {
        $product = product::find($id);

        $previouspicture = public_path(
            "AdminAssets/product-image/" . $product->image
        );

        if (File::exists($previouspicture)) {
            File::delete($previouspicture);
        }

        $product->delete();

        alert()->success('موفق!', 'محصول با موفقیت حذف شد');

        return redirect()->route('account.product.Products');
    }

    //CreateImage

    public function CreateImage($id)
    {
        return view('admin.product.createimage', compact('id'));
    }
    public function SaveImage(Request $request, $id)
    {
        if ($request->hasFile('image')) {

            $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();

            $request->image->move(
                public_path("AdminAssets/product-image"),
                $imageName
            );

            $dataform['images'] = $imageName;
            $dataform['id_product'] = $id;

            ProductImage::create($dataform);
            return redirect()->route('account.product.Products');
        }
    }

    public function ShowImages($id){
        $ProductImages=ProductImage::all();
        return view('Admin.product.showimages',compact('id','ProductImages'));
    }
}



























