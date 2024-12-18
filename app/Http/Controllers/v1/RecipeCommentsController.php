<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\RecipeCommentRequest;
use App\Models\RecipeComments;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RecipeCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($recipe_id)
    {
        $recipeComments = RecipeComments::with('client')->where('recipe_id', $recipe_id)->orderBy('rate', 'DESC')->get();

        if ($recipeComments->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No item comments found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $recipeComments], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecipeCommentRequest $request)
    {
        $comment = RecipeComments::create($request->validated());
        $comment = RecipeComments::with('client')->where('id', $comment->id)->first();

        if ($comment) {
            return response()->json(['status' => 200, 'result' => 'success create comment', 'data' => $comment], 200);
        }

        return response()->json(['status' => 500, 'result' => 'wrong create comment'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecipeCommentRequest $request, $id)
    {
        $comment = RecipeComments::with('client')->find($id);

        if (!$comment) {
            return response()->json(['status' => 404, 'result' => 'No comment found'], 404);
        }

        try {
            $comment->update($request->all());

            return response()->json(['status' => 200, 'result' => 'update comment success', 'data' => $comment], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update comment failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = RecipeComments::find($id);

        if (!$comment) {
            return response()->json(['status' => 404, 'result' => 'No comment found'], 404);
        }

        // if ($comment->delete()) {
        return response()->json(['status' => 200, 'result' => 'delete comment success'], 200);
        // }

        return response()->json(['status' => 500, 'result' => 'delete comment failed'], 500);
    }
}
