<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;

    protected $fillable=['path'];

    public function imageable (){
        return $this->morphTo();
    }

    public function storageImage($image){
        $path=$image->store('public/images');
        $this->path=$path;
        $this->save;
    }
}
