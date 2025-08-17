<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show($id): View
    {
        $product = Product::with(['price', 'group.parent'])->findOrFail($id);

        // Построение хлебных крошек (массив групп от корня к текущей)
        $breadcrumbs = $this->buildBreadcrumbs($product->group);

        return view('product.show', compact('product', 'breadcrumbs'));
    }

    private function buildBreadcrumbs($group): array
    {
        $breadcrumbs = [];
        while ($group) {
            array_unshift($breadcrumbs, $group);
            $group = $group->parent;
        }

        return $breadcrumbs;
    }
}
