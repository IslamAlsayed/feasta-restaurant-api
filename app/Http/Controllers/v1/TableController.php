<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TableRequest;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::where('status', 'available')->get();

        if ($tables->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No tables found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $tables], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        $table = Table::create($request->validated());

        if ($table) {
            return response()->json(['status' => 200, 'result' => 'order created successfully', 'data' => $table], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create table'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $table = Table::find($id);

        if (!$table) {
            return response()->json(['status' => 404, 'result' => 'No table found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $table], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, $id)
    {
        try {
            $table = Table::find($id);

            if (!$table) {
                return response()->json(['status' => 404, 'result' => 'No table found'], 404);
            }

            $table->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update table success', 'data' => $table], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update table failed', 'error' => $e->getMessage()], 500);
        }
    }

    // public function updateStatus(Request $request, $id)
    // {
    //     $table = Table::find($id);

    //     if (!$table) {
    //         return response()->json(['status' => 404, 'result' => 'No table found'], 404);
    //     }

    //     // Validation
    //     $request->validate(['status' => 'required|in:pending,completed,cancelled']);

    //     // Update the table status
    //     $table->status = $request->status;
    //     $table->save();

    //     broadcast(new SendMessage($table->id));

    //     return response()->json(
    //         [
    //             'status' => 200,
    //             'result' => 'Order status updated successfully',
    //             'data' => ['id' => $table->id, 'status' => $table->status]
    //         ],
    //         200
    //     );
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $table = Table::find($id);

        if (!$table) {
            return response()->json(['status' => 404, 'result' => 'No table found'], 404);
        }

        $deleteState = $table->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete table success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete table failed'], 500);
    }
}
