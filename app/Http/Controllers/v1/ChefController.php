<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ChefRequest;
use App\Http\Requests\v1\StockRequest;
use App\Models\Chef;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chef = Chef::all();

        if ($chef->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No chef found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $chef], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefRequest $request)
    {
        $chef = Chef::create($request->validated());

        if ($chef) {
            return response()->json(['status' => 200, 'result' => 'success create chef', 'data' => $chef], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create chef'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chef = Chef::find($id);

        if (!$chef) {
            return response()->json(['status' => 404, 'result' => 'No chef found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $chef], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, $id)
    {
        try {
            $chef = Chef::find($id);

            if (!$chef) {
                return response()->json(['status' => 404, 'result' => 'No chef found'], 404);
            }

            $chef->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update chef success', 'data' => $chef], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update chef failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chef = Chef::find($id);

        if (!$chef) {
            return response()->json(['status' => 404, 'result' => 'No chef found'], 404);
        }

        $deleteState = $chef->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete chef success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete chef failed'], 500);
    }
}
