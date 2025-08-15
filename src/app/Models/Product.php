<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public const string FIELD_ID = 'id';
    public const string FIELD_ID_GROUP = 'id_group';
    public const string FIELD_NAME = 'name';

    protected $table = 'products';

    // Продукт принадлежит группе
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, self::FIELD_ID_GROUP, Group::FIELD_ID);
    }

    // Продукт имеет цену
    public function price(): HasOne
    {
        return $this->hasOne(Price::class, Price::FIELD_ID_PRODUCT, self::FIELD_ID);
    }
}
