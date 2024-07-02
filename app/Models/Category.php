<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $hidden = ['updated_at', 'created_at'];
    protected $fillable = [
        'id', 'name', 'photo', 'slug', 'created_at', 'updated_at'
    ];
}
