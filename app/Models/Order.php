<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Order extends Model {
        protected $guarded = [];
        protected $casts =[
            'cart_items'=>'json'
        ];
        public function items():BelongsToMany
        {
            return $this->belongsToMany(Item::class);
        }

        public function user():BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    }
