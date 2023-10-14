<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_details_id'
    ];

    public function orderReview(): HasMany
    {
        return $this->hasMany(OrderReview::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): HasOne
    {
        return $this->hasOne(OrderDetails::class);
    }

}
