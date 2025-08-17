@extends('layouts.app')

@section('content')
    {{-- Хлебные крошки --}}
    @include('partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    <h1>{{ $product->{\App\Models\Product::FIELD_NAME} }}</h1>

    <p>Цена: {{ number_format($product->price->price ?? 0, 2, ',', ' ') }} ₽</p>

    {{-- Можно добавить описание, фотографии и пр. --}}
@endsection
