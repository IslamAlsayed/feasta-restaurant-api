<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Http\Requests\v1\RatingRequest;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::with('client')->get();

        if ($ratings->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No ratings found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $ratings], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingRequest $request)
    {
        $rating = Rating::create($request->validated());

        if ($rating) {
            return response()->json(['status' => 200, 'result' => 'success create rating', 'data' => $rating], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create rating'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rating = Rating::with('client')->find($id);

        if (!$rating) {
            return response()->json(['status' => 404, 'result' => 'No rating found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $rating], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RatingRequest $request, $id)
    {
        try {
            $rating = Rating::with('client')->findOrFail($id);

            $rating->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update rating success', 'data' => $rating], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update rating failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rating = Rating::find($id);

        if (!$rating) {
            return response()->json(['status' => 404, 'result' => 'No rating found'], 404);
        }

        $deleteState = $rating->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete rating success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete rating failed'], 500);
    }
}
