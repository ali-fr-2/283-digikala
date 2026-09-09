<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\account\ctegorycontroller;
use App\Http\Controllers\account\productcontroller;

Route::get('panel', function () {
    return view('Admin.index');
});
Route::prefix('account')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('create',[ctegorycontroller::class,'CreateCategory'])->name('account.category.create');
        Route::post('create',[ctegorycontroller::class,'StoreCategory'])->name('account.category.Store');

        Route::get('categories',[ctegorycontroller::class,'Categories'])->name('account.category.categories');

        Route::get('edit/{id}',[ctegorycontroller::class,'Edit'])->name('account.category.Edit');
        Route::post('edit/{id}',[ctegorycontroller::class,'Update'])->name('account.category.Update');

        Route::get('delete/{id}',[ctegorycontroller::class,'Delete'])->name('account.category.Delete');

    });

    Route::prefix('product')->group(function(){
        Route::get('create',[productcontroller::class,'create'])->name('account.product.create');
    });
});
