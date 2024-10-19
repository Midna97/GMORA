<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       $title = $request->input('title');
       $recipeWhere = Recipe::where('title',$title)->paginate(10);
       return response()->json(['recipe' => $recipeWhere]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipe = Recipe::create(['title'=>$request->title,'description'=>$request->description,'instructions'=>$request->instructions,'category_id'=>$request->category_id,'user_id'=>$request->user_id]);
        return response()->json(['title'=> $recipe]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $recipe = Recipe::with('categoriy')->findOrFail($id);
            return response()->json($recipe);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No existe esta receta'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
