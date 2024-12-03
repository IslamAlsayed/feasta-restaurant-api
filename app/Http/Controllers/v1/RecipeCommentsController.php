<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\MenuComments;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RecipeCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $menuComments = MenuComments::with('menu', 'client')->where('menu_id', $id)->get();

        if ($menuComments->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No item comments found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $menuComments], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$request->input('comment')) {
            return response()->json(['status' => 500, 'result' => 'the comment is require'], 500);
        }

        if (!$request->input('rate')) {
            return response()->json(['status' => 500, 'result' => 'the rate is require'], 500);
        }

        $newComment = [
            'name' => $user->name ?? 'user',
            'comment' => $request->input('comment'),
            'rate' => $request->input('rate'),
            'menu_id' => $request->input('menu_id'),
            'client_id' => $user->id,
        ];

        $comment = MenuComments::create($newComment);

        if ($comment) {
            return response()->json(['status' => 200, 'result' => 'success create comment', 'data' => $comment], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create comment'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $comment = MenuComments::find($id);

        if (!$comment) {
            return response()->json(['status' => 404, 'result' => 'No comment found'], 404);
        }

        if (!$request->input('comment')) {
            return response()->json(['status' => 500, 'result' => 'the comment is require'], 500);
        }

        if (!$request->input('rate')) {
            return response()->json(['status' => 500, 'result' => 'the rate is require'], 500);
        }

        if (!$request->input('menu_id')) {
            return response()->json(['status' => 500, 'result' => 'the menu id is require'], 500);
        }

        if (!$request->input('client_id')) {
            return response()->json(['status' => 500, 'result' => 'the client id is require'], 500);
        }

        $updateComment = [
            'comment' => $request->input('comment'),
            'rate' => $request->input('rate'),
        ];

        try {
            $comment->update($updateComment);

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
        $menuComments = MenuComments::find($id);

        if (!$menuComments) {
            return response()->json(['status' => 404, 'result' => 'No comment found'], 404);
        }

        if ($menuComments->delete()) {
            return response()->json(['status' => 200, 'result' => 'delete comment success'], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'delete comment failed'], 500);
        }
    }
}
