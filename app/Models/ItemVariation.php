<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class ItemVariation extends Model {

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
