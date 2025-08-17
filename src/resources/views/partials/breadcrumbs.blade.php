<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Главная</a></li>
        @foreach($breadcrumbs as $crumb)
            <li class="breadcrumb-item">
                <a href="{{ route('group.show', $crumb->{\App\Models\Group::FIELD_ID}) }}">{{ $crumb->{\App\Models\Group::FIELD_NAME} }}</a>
            </li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{ $product->{\App\Models\Product::FIELD_NAME} ?? '' }}</li>
    </ol>
</nav>
