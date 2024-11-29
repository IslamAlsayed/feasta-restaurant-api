<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\OfferRequest;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $offer = Offer::create($request->validated());

        if ($offer) {
            return response()->json(['status' => 200, 'result' => 'success create offer', 'data' => $offer], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create offer'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offer = Offer::with('menu')->find($id);

        if (!$offer) {
            return response()->json(['status' => 404, 'result' => 'No offer found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $offer], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, $id)
    {
        try {
            $offer = Offer::find($id);

            if (!$offer) {
                return response()->json(['status' => 404, 'result' => 'No offer found'], 404);
            }

            $offer->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update offer success', 'data' => $offer], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update offer failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);

        if (!$offer) {
            return response()->json(['status' => 404, 'result' => 'No offer found'], 404);
        }

        $deleteState = $offer->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete offer success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete offer failed'], 500);
    }
}
