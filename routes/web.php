<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\account\ctegorycontroller;
use App\Http\Controllers\account\productcontroller;

Route::get('panel', function () {
    return view('Admin.index');
});
Route::prefix('account')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('create', [ctegorycontroller::class, 'CreateCategory'])->name('account.category.create');
        Route::post('create', [ctegorycontroller::class, 'StoreCategory'])->name('account.category.Store');

        Route::get('categories', [ctegorycontroller::class, 'Categories'])->name('account.category.categories');

        Route::get('edit/{id}', [ctegorycontroller::class, 'Edit'])->name('account.category.Edit');
        Route::post('edit/{id}', [ctegorycontroller::class, 'Update'])->name('account.category.Update');

        Route::get('delete/{id}', [ctegorycontroller::class, 'Delete'])->name('account.category.Delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('create', [productcontroller::class, 'Create'])->name('account.product.Create');
        Route::post('create', [productcontroller::class, 'Storeproduct'])->name('account.product.Store');

        Route::get('products', [productcontroller::class, 'Products'])->name('account.product.Products');

        Route::get('edit/{id}', [productcontroller::class, 'Edit'])->name('account.product.Edit');
        Route::PUT('edit/{id}', [productcontroller::class, 'Update'])->name('account.product.Update');
        Route::DELETE('delete/{id}', [productcontroller::class, 'Delete'])->name('account.product.Delete');

        Route::get('CreateImage/{id}', [productcontroller::class, 'CreateImage'])->name('account.product.CreateImage');
        Route::POST('CreateImage/{id}', [productcontroller::class, 'SaveImage'])->name('account.product.SaveImage');

        Route::get('ShowImages/{id}', [productcontroller::class, 'ShowImages'])->name('account.product.ShowImages');
        Route::DELETE('DeleteImage/{id}', [productcontroller::class, 'DeleteImage'])->name('account.product.DeleteImage');
    });
});
