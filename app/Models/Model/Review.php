<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Model\Product;

class Review extends Model
{
    protected $fillable = [
        'customer', 'star', 'review'
    ];
    
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
