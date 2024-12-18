<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ArticleLikeRequest;
use App\Models\ArticleLikes;
use Illuminate\Http\Request;

class ArticleLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleLikeRequest $request)
    {
        try {
            $article_like = ArticleLikes::create($request->validated());

            return response()->json(['status' => 200, 'result' => 'success create comment', 'data' => $article_like], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'wrong create comment', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($article_id)
    {
        $likes = ArticleLikes::where('article_id', $article_id)->get();

        if ($likes->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No likes found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $likes, 'count' => $likes->count()], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($article_id, $client_id)
    {
        $like = ArticleLikes::where('article_id', $article_id)->where('client_id', $client_id)->first();

        if (!$like) {
            return response()->json(['status' => 404, 'result' => 'No like found'], 404);
        }

        if ($like->delete()) {
            return response()->json(['status' => 200, 'result' => 'delete like success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete like failed'], 500);
    }
}
