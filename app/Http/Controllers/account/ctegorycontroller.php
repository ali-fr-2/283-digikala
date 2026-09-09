<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\category;
// use Faker\Core\File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ctegorycontroller extends Controller
{
    public function CreateCategory()
    {
        return view('admin.category.createcategory');
    }

    public function StoreCategory(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();
            $request->image->move(public_path("AdminAssets/category-image"), $imageName);
            $dataform = $request->all();
            $dataform['image'] = $imageName;

            category::create($dataform);
            alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
            return redirect()->route('account.category.categories');
        }
    }

    public function Categories()
    {

        $categories = category::all();

        return view('admin.category.category', compact('categories'));
    }

    public function Edit($id)
    {
        $category = category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function Update(Request $request, $id)
    {
        $category = category::find($id);
        if ($request->hasFile('image')) {
            $imageName = random_int(1000000, 9999999) . '.' . $request->image->extension();
            $request->image->move(public_path("AdminAssets/category-image"), $imageName);
            $dataform = $request->all();
            $dataform['image'] = $imageName;

            $picture = public_path("AdminAssets/category-image/" . $category->image);
            if (File::exists($picture)) {
                File::delete($picture);
            }

            $category->update($dataform);
            alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
            return redirect()->route('account.category.categories');
        }
    }

    public function Delete($id)
    {
        $category = category::find($id);
        $picture = public_path("AdminAssets/category-image/" . $category->image);
        if (File::exists($picture)) {
            File::delete($picture);
        }
        $category->delete();
        alert()->success('موفق!', 'عملیات با موفقیت انجام شد');
        return redirect()->route('account.category.categories');
    }
}
