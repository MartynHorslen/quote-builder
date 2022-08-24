<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote_Items extends Model
{
    use HasFactory;

    protected $table = 'quote_items';

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
}
