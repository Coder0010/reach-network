<?php

namespace MostafaKamel\AdvertiseringSystem\Models;

use App\Models\User;
use MostafaKamel\AdvertiseringSystem\Models\Filter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use MostafaKamel\AdvertiseringSystem\Database\Factories\AdFactory;

class Ad extends Entity
{
    const FREE = 'free';
    const PAID = 'paid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'user_id',
        'start_date',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AdFactory::new();
    }

    /**
     * category Relationship.
     *
     * @return belongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Filter::class)->whereType(Filter::CATEGORY_TYPE);
    }

    /**
     * advertiser Relationship.
     *
     * @return belongsTo
     */
    public function advertiser() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * tags relation.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Filter::class, "ad_tag", "ad_id", "tag_id")
                    ->withTimestamps();
    }

    public function related_ads()
    {
        $tags_id     = $this->tags()->pluck('tag_id');
        $category_id = $this->category_id;
        $dataByCategory = Ad::whereNotIn('id', [$this->id])->whereCategoryId($category_id)->get();
        $dataByTagsid   = Ad::whereNotIn('id', [$this->id])->whereRelation('tags', 'tag_id', '=', $tags_id)->get();

        return collect(
            $dataByCategory,
            $dataByTagsid
        );
    }
}
