<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\v1\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('client')->get();

        if ($orders->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No orders found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $orders], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $order = Order::create($request->validated());

        if ($order) {
            return response()->json(['status' => 200, 'result' => 'order created successfully', 'data' => $order], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create order'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with('client')->find($id);

        if (!$order) {
            return response()->json(['status' => 404, 'result' => 'No order found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $order], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, $id)
    {
        try {
            $order = Order::with('client')->findOrFail($id);

            $order->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update order success', 'data' => $order], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update order failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        // Validation
        $request->validate(['status' => 'required|in:pending,completed,cancelled']);

        $order = Order::with('client')->findOrFail($id);

        // Update the order status
        $order->status = $request->status;
        $order->save();

        return response()->json(
            [
                'status' => 200,
                'result' => 'Order status updated successfully',
                'data' => ['id' => $order->id, 'status' => $order->status]
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $deleteState = $order->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete order success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete order failed'], 500);
    }
}
