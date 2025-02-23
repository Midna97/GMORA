<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $table='roles';
   protected $fillable = [
       'role',
       'created_at',
       'updated_at',
       'description',

   ];

   public function user(){
       return $this->hasOne(User::class, 'id');

   }
}
