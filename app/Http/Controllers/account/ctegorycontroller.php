<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

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
        return redirect()->route('account.category.create');
    }
}
