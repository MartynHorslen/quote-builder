<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Quote_Items::class, 'quote_id');
    }
}
