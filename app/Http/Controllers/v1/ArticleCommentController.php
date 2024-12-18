<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ArticleCommentRequest;
use App\Models\ArticleComments;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($article_id)
    {
        $comments = ArticleComments::with('client')->where('article_id', $article_id)->get();

        if ($comments->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No comments found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $comments], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCommentRequest $request)
    {
        try {
            $article_comment = ArticleComments::create($request->validated());
            $article_comment = ArticleComments::with('client')->where('id', $article_comment->id)->first();

            return response()->json(['status' => 200, 'result' => 'success create comment', 'data' => $article_comment], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'wrong create comment', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($client_id)
    {
        $comments = ArticleComments::with('client')->where('client_id', $client_id)->get();

        if ($comments->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No comments found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $comments], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $article_id)
    {
        $comment = ArticleComments::find($article_id);

        if (!$comment) {
            return response()->json(['status' => 404, 'result' => 'No comment found'], 404);
        }

        $comment->update($request->all());

        return response()->json(['status' => 200, 'result' => 'update comment success', 'data' => $comment], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = ArticleComments::find($id);

        if (!$comment) {
            return response()->json(['status' => 404, 'result' => 'No comment found'], 404);
        }

        if ($comment->delete()) {
            return response()->json(['status' => 200, 'result' => 'delete comment success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete comment failed'], 500);
    }
}
