<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentOptions extends Model
{
    use HasFactory;

     protected $fillable = [
        'type'
    ];

    public function orderDetails(): BelongsTo
    {
        return $this->belongsTo(OrderDetails::class);
    }

}
