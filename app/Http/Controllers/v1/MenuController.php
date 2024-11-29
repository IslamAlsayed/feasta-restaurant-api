<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Requests\v1\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('chef')->get();

        if ($menu->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No item found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $menu], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $menu = Menu::create($request->validated());

        if ($menu) {
            return response()->json(['status' => 200, 'result' => 'success create item', 'data' => $menu], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create item'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::with('chef')->find($id);

        if (!$menu) {
            return response()->json(['status' => 404, 'result' => 'No item found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $menu], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, $id)
    {
        try {
            $menu = Menu::with('chef')->find($id);

            if (!$menu) {
                return response()->json(['status' => 404, 'result' => 'No item found'], 404);
            }

            $menu->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update item success', 'data' => $menu], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update item failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json(['status' => 404, 'result' => 'No item found'], 404);
        }

        $deleteState = $menu->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete item success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete item failed'], 500);
    }
}
