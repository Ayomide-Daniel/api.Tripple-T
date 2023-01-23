<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BottleVariant;
use App\Http\Resources\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\BottleResource;
use App\Http\Resources\BottleCollection;
use App\Http\Requests\BottleStoreRequest;
use App\Http\Requests\BottleUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminBottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BottleStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(BottleStoreRequest $request)
    {
        $validated = $request->validated();

        $bottle = BottleVariant::create($validated);

        return new ApiResponse($bottle);
    }

    /**
     * Display the specified resource.
     *
     * @param  BottleVariant  $bottle
     * @return \Illuminate\Http\Response
     */
    public function show(BottleVariant $bottle)
    {
        return new ApiResponse($bottle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BottleUpdateRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BottleUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $bottle = BottleVariant::findOrFail($id);

        $bottle->update($validated);

        return new ApiResponse($bottle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bottle = BottleVariant::findOrFail($id);
    
            $bottle->delete();
    
            return new ApiResponse([]);
        }
        catch (\Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response()->json([
                    'status' => false,
                    'message' => 'Bottle not found',
                ], 404);
            }

            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
