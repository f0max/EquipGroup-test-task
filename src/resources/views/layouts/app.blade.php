<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог интернет-магазина</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pagination svg {
            width: 1em !important;
            height: 1em !important;
            vertical-align: middle;
        }

        .page-link, .page-item {
            min-width: 2.5rem;
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .page-link svg {
            pointer-events: none;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3 mb-4">
    <a class="navbar-brand" href="{{ route('catalog.index') }}">Магазин</a>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
