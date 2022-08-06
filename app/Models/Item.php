<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Item extends Model {
        use HasFactory;
        protected $guarded = [];

        public function food_type(): belongsTo
        {
            return $this->belongsTo(FoodType::class);
        }
    }
