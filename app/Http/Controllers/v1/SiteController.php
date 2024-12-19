<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Http\Requests\v1\SiteRequest;

class SiteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(SiteRequest $request)
    {
        $site = Site::create($request->validated());

        if ($site) {
            return response()->json(['status' => 200, 'result' => 'success create site', 'data' => $site], 200);
        }

        return response()->json(['status' => 500, 'result' => 'wrong create site'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $site = Site::find($id);

        if (!$site) {
            return response()->json(['status' => 404, 'result' => 'No sites found'], 404);
        }

        return response()->json(['status' => 200, 'result' => $site], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiteRequest $request,  $id)
    {
        try {
            $site = Site::find($id);

            if (!$site) {
                return response()->json(['status' => 404, 'result' => 'No site found'], 404);
            }

            $site->update($request->validated());

            return response()->json(['status' => 200, 'result' => 'update site success', 'data' => $site], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'result' => 'update site failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $site = Site::find($id);

        if (!$site) {
            return response()->json(['status' => 404, 'result' => 'No site found'], 404);
        }

        $deleteState = $site->delete();

        if ($deleteState) {
            return response()->json(['status' => 200, 'result' => 'delete site success'], 200);
        }

        return response()->json(['status' => 500, 'result' => 'delete site failed'], 500);
    }
}
