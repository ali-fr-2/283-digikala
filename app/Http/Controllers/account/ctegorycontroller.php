<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ctegorycontroller extends Controller
{
    public function CreateCategory(){
        return view('admin.category.createcategory');
    }
}
