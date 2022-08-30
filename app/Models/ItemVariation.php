<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class ItemVariation extends Model {
        use HasFactory;
        protected $appends=[
            'thumb_image_url'
        ];
        public function item(): BelongsTo
        {
            return $this->belongsTo(Item::class);
        }

        public function getThumbImageUrlAttribute(){
            return $this->item->thumb_url;
    }
    }
