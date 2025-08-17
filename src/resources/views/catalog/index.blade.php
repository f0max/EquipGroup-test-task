@extends('layouts.app')

@section('content')
    <h1>Каталог товаров</h1>

    {{-- Выпадающий список групп --}}
    @include('partials.group-dropdown')

    {{-- Сортировка --}}
    <form method="GET" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="sort_field" class="col-form-label">Сортировка:</label>
            </div>
            <div class="col-auto">
                <select name="sort_field" id="sort_field" class="form-select">
                    <option value="price" {{ $sortField === 'price' ? 'selected' : '' }}>По цене</option>
                    <option value="name" {{ $sortField === 'name' ? 'selected' : '' }}>По названию</option>
                </select>
            </div>
            <div class="col-auto">
                <select name="sort_order" id="sort_order" class="form-select">
                    <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>По возрастанию</option>
                    <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>По убыванию</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Применить</button>
            </div>
        </div>
    </form>

    {{-- Товары --}}
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('product.show', $product->id) }}">{{ $product->{\App\Models\Product::FIELD_NAME} }}</a>
                        </h5>
                        <p class="card-text">Цена: {{ number_format($product->price->price ?? 0, 2, ',', ' ') }} ₽</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Пагинация --}}
    <div class="mt-4">
        {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
@endsection
