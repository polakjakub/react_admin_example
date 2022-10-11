<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        ];

    public function stocks()
    {
        return $this->belongsToMany(Stock::class)->withPivot('quantity');
    }
}
