<?php

namespace MostafaKamel\AdvertiseringSystem\Models;

use MostafaKamel\AdvertiseringSystem\Models\Ad;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use MostafaKamel\AdvertiseringSystem\Database\Factories\FilterFactory;

class Filter extends Entity
{
    const CATEGORY_TYPE = 'category';
    const TAG_TYPE = 'tag';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FilterFactory::new();
    }

    /**
     * ads relation.
     *
     * @return BelongsToMany
     */
    public function ads(): BelongsToMany
    {
        return $this->belongsToMany(Ad::class, "ad_tag", "tag_id", "ad_id")
                    ->withTimestamps();
    }
}
