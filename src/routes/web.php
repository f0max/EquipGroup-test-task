<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;

// Главная страница каталога: список групп первого уровня и все товары с сортировкой и пагинацией
Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');

// Страница конкретной группы с её подгруппами и товарами
Route::get('/group/{id}', [GroupController::class, 'show'])->name('group.show')
    ->where('id', '[0-9]+');

// Карточка товара с информацией и хлебными крошками
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show')
    ->where('id', '[0-9]+');
