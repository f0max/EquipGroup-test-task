<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    public const string FIELD_ID = 'id';
    public const string FIELD_ID_PRODUCT = 'id_product';
    public const string FIELD_PRICE = 'price';

    protected $table = 'prices';

    // Цена принадлежит продукту
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, self::FIELD_ID_PRODUCT, Product::FIELD_ID);
    }
}
