<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribe = Subscribe::all();

        if ($subscribe->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No subscribe found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $subscribe], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subscribe = Subscribe::where('email', $request->input('email'))->first();

        if ($subscribe) {
            return response()->json(['status' => 500, 'result' => 'the email is subscribe already!'], 500);
        }

        if (!$request->input('email')) {
            return response()->json(['status' => 500, 'result' => 'the email is required'], 500);
        }

        $subscribe = Subscribe::create($request->all());

        if ($subscribe) {
            return response()->json(['status' => 200, 'result' => 'success create subscribe', 'data' => $subscribe], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create subscribe'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subscribe = Subscribe::find($id);

        if (!$subscribe) {
            return response()->json(['status' => 404, 'result' => 'No subscribe found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $subscribe], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subscribe = Subscribe::find($id);

        if (!$subscribe) {
            return response()->json(['status' => 404, 'result' => 'No subscribe found'], 404);
        }

        $deleteState = $subscribe->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete subscribe success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete subscribe failed'], 500);
    }

    public function counter()
    {
        $clients = Client::count();
        $ratings = Rating::count();
        $orders = Order::count();
        $recipes = Menu::count();

        $result = [
            'clients' => $clients,
            'ratings' => $ratings,
            'orders' => $orders,
            'recipes' => $recipes
        ];

        if ($clients === 0 && $ratings === 0 && $orders === 0 && $recipes === 0) {
            return response()->json(['status' => 500, 'result' => 'no result'], 500);
        }

        return response()->json(['status' => 200, 'result' => $result], 200);
    }
}
