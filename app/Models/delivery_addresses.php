<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_addresses extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo(customers::class, 'customer_id')->where('is_active', 1);
    }

    
}
