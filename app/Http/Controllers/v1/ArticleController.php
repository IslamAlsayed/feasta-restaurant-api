<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\v1\ArticleRequest;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('articleComments.client')
            ->withCount('articleComments')
            ->orderByDesc('article_comments_count')
            ->with('articleLikes')
            ->withCount('articleLikes')
            ->orderByDesc('article_likes_count')
            ->get();

        if ($articles->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No articles found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $articles], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->validated());

        if ($article) {
            return response()->json(['status' => 200, 'result' => 'success create article', 'data' => $article], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create article'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::with('articleComments.client')
            ->where('id', $id)
            ->withCount('articleComments')
            ->orderByDesc('article_comments_count')
            ->with('articleLikes')
            ->withCount('articleLikes')
            ->orderByDesc('article_likes_count')
            ->first();

        if (!$article) {
            return response()->json(['status' => 404, 'result' => 'No article found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $article], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, $id)
    {
        try {
            $article = Article::find($id);

            if (!$article) {
                return response()->json(['status' => 404, 'result' => 'No article found'], 404);
            }

            $article->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update article success', 'data' => $article], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update article failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['status' => 404, 'result' => 'No article found'], 404);
        }

        $deleteState = $article->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete article success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete article failed'], 500);
    }
}
