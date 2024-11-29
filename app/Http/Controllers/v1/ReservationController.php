<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Http\Requests\v1\Reservation\ReservationRequest;
use App\Http\Requests\v1\Reservation\UpdateReservationRequest;
use App\Jobs\SendReservationReminderJob;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();

        if ($reservations->isEmpty()) {
            return response()->json(['status' => 404, 'result' => 'No reservations found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $reservations], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());

        SendReservationReminderJob::dispatch($reservation);

        if ($reservation) {
            return response()->json(['status' => 200, 'result' => 'success create reservation', 'data' => $reservation], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong create reservation'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['status' => 404, 'result' => 'No reservation found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $reservation], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request,  $id)
    {
        try {
            $reservation = Reservation::find($id);

            if (!$reservation) {
                return response()->json(['status' => 404, 'result' => 'No reservation found'], 404);
            }

            $reservation->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update reservation success', 'data' => $reservation], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update reservation failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['status' => 404, 'result' => 'No reservation found'], 404);
        }

        $deleteState = $reservation->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete reservation success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete reservation failed'], 500);
    }
}
