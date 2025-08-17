<div class="dropdown mb-4">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="groupDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Выберите группу товаров
    </button>
    <ul class="dropdown-menu" aria-labelledby="groupDropdown" style="max-height: 300px; overflow-y: auto;">
        @foreach(\App\Models\Group::where(\App\Models\Group::FIELD_ID_PARENT, 0)->get() as $mainGroup)
            <li>
                <a class="dropdown-item" href="{{ route('group.show', $mainGroup->id) }}">
                    {{ $mainGroup->{\App\Models\Group::FIELD_NAME} }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
