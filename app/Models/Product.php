<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $hidden = ['updated_at', 'created_at'];
    protected $fillable = [
        'id', 'name', 'photo', 'price', 'quantity', 'variants', 'category_id', 'slug', 'created_at', 'updated_at'
    ];
}
