<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Item extends Model implements HasMedia {
        use HasFactory, InteractsWithMedia;

        protected $appends =['file_url','thumb_url'];

        public function item_variations(): HasMany
        {
            return $this->hasMany(ItemVariation::class, 'item_id');
        }

        public function registerMediaConversions(Media $media = null): void
        {
            $this->addMediaConversion('thumb')
                ->width(100)
                ->height(100);
        }

        public function food_type(): belongsTo
        {
            return $this->belongsTo(FoodType::class);
        }

        public function getFileUrlAttribute()
        {
            return $this->getFirstMediaUrl('featured_image');
        }

        public function getThumbUrlAttribute()
        {
            return $this->getFirstMediaUrl('featured_image','thumb');
        }

    }
