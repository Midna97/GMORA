<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;

class ImageController extends Controller
{
    public function store (Request $request){
        $image=new Image();
        $image->storageImage($request->file('image'));
        $user=User::find($request->user_id);
        $user->images()->save($image);
        return response()->json(['message'=>'Imagen guardada correctamente']);
    }
}
