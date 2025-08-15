<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    public const string FIELD_ID = 'id';
    public const string FIELD_ID_PARENT = 'id_parent';
    public const string FIELD_NAME = 'name';

    protected $table = 'groups';

    // Группа может иметь дочерние группы
    public function children(): HasMany
    {
        return $this->hasMany(Group::class, self::FIELD_ID_PARENT, self::FIELD_ID);
    }

    // Группа может иметь родительскую группу
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Group::class, self::FIELD_ID_PARENT, self::FIELD_ID);
    }

    // Группа имеет много товаров
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, Product::FIELD_ID_GROUP, self::FIELD_ID);
    }
}
