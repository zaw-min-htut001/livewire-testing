<?php

use App\Livewire\ItemEdit;
use App\Livewire\Data\ItemAdd;
use App\Livewire\Data\ItemLists;
use App\Livewire\Data\CategoryAdd;
use App\Livewire\Data\CategoryEdit;
use App\Livewire\Data\CategoryLists;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('item/list/', ItemLists::class)->name('itemLists');
   Route::get('item/add/', ItemAdd::class)->name('itemAdd');
   Route::get('item/edit/{id}', ItemEdit::class)->name('itemEdit');


   Route::get('categories/list/', CategoryLists::class)->name('categoriesLists');
   Route::get('categories/add/', CategoryAdd::class)->name('categoriesAdd');
   Route::get('categories/edit/{id}', CategoryEdit::class)->name('categoriesEdit');

});

require __DIR__.'/auth.php';
