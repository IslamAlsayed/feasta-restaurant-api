<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Http\Requests\v1\StockRequest;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::all();

        if ($stock->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No stock found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $stock], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request)
    {
        $stock = Stock::create($request->validated());

        if ($stock) {
            return response()->json(['status' => 200, 'result' => 'success create stock', 'data' => $stock], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create stock'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json(['status' => 404, 'result' => 'No stock found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $stock], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, $id)
    {
        try {
            $stock = Stock::find($id);

            if (!$stock) {
                return response()->json(['status' => 404, 'result' => 'No stock found'], 404);
            }

            $stock->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update stock success', 'data' => $stock], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update stock failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json(['status' => 404, 'result' => 'No stock found'], 404);
        }

        $deleteState = $stock->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete stock success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete stock failed'], 500);
    }
}
