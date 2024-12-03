<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRequest $request)
    {
        // $item = $request->input('items');
        // return $item['price'] . ' | ' . floor($item['price'] + ($item['price'] * ($item['vat'] / 100)));
        // return $item['price'] . ' | ' . ceil($item['price'] + ($item['price'] * ($item['vat'] / 100)));
        // return $request->all();

        $cart = Cart::create($request->validated());

        if ($cart) {
            $cart = Cart::with('client')->find($cart->id);

            if (!$cart) {
                return response()->json(['status' => 404, 'result' => 'No cart found'], 404);
            }

            return response()->json(['status' => 200, 'result' => 'cart created successfully', 'data' => $cart], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create cart'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($client_id, $code)
    {
        $cart = Cart::with('client')->where('client_id', $client_id)->where('code', $code)->first();

        if (!$cart) {
            return response()->json(['status' => 404, 'result' => 'No cart found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $cart], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartRequest $request, $id)
    {
        return $request->all();

        try {
            $cart = Cart::with('client')->find($id);

            if (!$cart) {
                return response()->json(['status' => 404, 'result' => 'No cart found'], 404);
            }

            $cart->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update cart success', 'data' => $cart], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update cart failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['status' => 404, 'result' => 'No cart found'], 404);
        }

        $deleteState = $cart->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete cart success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete cart failed'], 500);
    }
}
