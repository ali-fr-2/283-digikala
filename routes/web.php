<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\account\ctegorycontroller;

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
    });
});
