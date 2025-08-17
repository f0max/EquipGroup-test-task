<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class GroupController extends Controller
{
    public function show(Request $request, $id): View
    {
        $group = Group::with('children')->findOrFail($id);

        $sortField = $request->get('sort_field', 'price');
        $sortOrder = $request->get('sort_order', 'asc');

        if (!in_array($sortField, ['price', 'name'])) {
            $sortField = 'price';
        }
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        // Получаем id всех групп: текущей и дочерних
        $groupsIds = $this->getAllGroupIds($group);

        // Получаем товары из текущей и всех вложенных групп
        $products = Product::with('price')
            ->whereIn('id_group', $groupsIds)
            ->join('prices', 'products.id', '=', 'prices.id_product')
            ->orderBy('prices.price', $sortOrder)
            ->orderBy('products.name', $sortOrder)
            ->select('products.*')
            ->paginate(12);

        return view('group.show', compact('group', 'products', 'sortField', 'sortOrder'));
    }

    // Рекурсивный сбор id текущей и всех дочерних групп
    private function getAllGroupIds(Group $group): array
    {
        $ids = [$group->{Group::FIELD_ID}];
        foreach ($group->children()->get() as $child) {
            $ids = array_merge($ids, $this->getAllGroupIds($child));
        }

        return $ids;
    }
}
