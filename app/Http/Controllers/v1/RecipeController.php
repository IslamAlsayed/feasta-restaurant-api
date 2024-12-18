<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Http\Requests\v1\RecipeRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::with('chef')->get();

        foreach ($recipes as $recipe) {
            $recipe['price'] = round($recipe['price'] + ($recipe['price'] * $recipe['vat'] / 100), 2);
            $recipe['vat'] = $recipe['vat'] / 100;
        }

        if ($recipes->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No recipe found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $recipes], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecipeRequest $request)
    {
        $recipe = Recipe::create($request->validated());

        if ($recipe) {
            return response()->json(['status' => 200, 'result' => 'success create recipe', 'data' => $recipe], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create recipe'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::with('chef')->find($id);

        if (!$recipe) {
            return response()->json(['status' => 404, 'result' => 'No recipe found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $recipe], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecipeRequest $request, $id)
    {
        try {
            $recipe = Recipe::with('chef')->find($id);

            if (!$recipe) {
                return response()->json(['status' => 404, 'result' => 'No recipe found'], 404);
            }

            $recipe->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update recipe success', 'data' => $recipe], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update recipe failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return response()->json(['status' => 404, 'result' => 'No recipe found'], 404);
        }

        $deleteState = $recipe->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete recipe success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete recipe failed'], 500);
    }
}
