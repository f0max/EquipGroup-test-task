<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        // Получаем группы первого уровня
        $groups = Group::where(Group::FIELD_ID_PARENT, 0)->get();

        // Получаем все товары с сортировкой и пагинацией
        $sortField = $request->get('sort_field', 'price'); // по умолчанию сортируем по цене
        $sortOrder = $request->get('sort_order', 'asc');  // по возрастанию по умолчанию

        // Проверяем допустимые поля сортировки
        if (!in_array($sortField, ['price', 'name'])) {
            $sortField = 'price';
        }
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        // Запрос с присоединением цены
        $products = Product::with('price')
            ->join('prices', 'products.id', '=', 'prices.id_product')
            ->orderBy('prices.price', $sortOrder)
            ->orderBy('products.name', $sortOrder)
            ->select('products.*')
            ->paginate(12);

        return view('catalog.index', compact('groups', 'products', 'sortField', 'sortOrder'));
    }
}
