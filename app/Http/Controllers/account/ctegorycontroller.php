<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ctegorycontroller extends Controller
{
    public function CreateCategory(){
        return view('admin.category.createcategory');
    }

    public function StoreCategory(Request $request){
        $imageName=random_int(1000000,9999999).'.'.$request->image->extension();
        $request->image->move(public_path("AdminAssets/category-image"),$imageName);
        $dataform=$request->all();
        $dataform['image']=$imageName;

        category::create($dataform);
        alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
        return redirect()->route('account.category.categories');
    }

    public function Categories(){

        $categories=category::all();

        return view('admin.category.category',compact('categories'));
    }
}
