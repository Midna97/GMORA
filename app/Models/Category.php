<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table='categories';
    protected $fillable = [
        'id',
        'description',
    ];

    public function recipe(){
        return $this->hasMany(Recipe::class, 'category_id');
    }  
}
