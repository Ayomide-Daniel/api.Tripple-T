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
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

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
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BottleStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(BottleStoreRequest $request)
    {
        $validated = $request->validated();

        $bottle = BottleVariant::create($validated);

        return new ApiResponse($bottle, "Bottle created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  BottleVariant  $bottle
     * @return \Illuminate\Http\Response
     */
    public function show(BottleVariant $bottle)
    {
        return new ApiResponse($bottle, "Bottle fetched successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BottleUpdateRequest
     * @param  BottleVariant  $bottle
     * @return \Illuminate\Http\Response
     */
    public function update(BottleUpdateRequest $request, BottleVariant $bottle)
    {
        $validated = $request->validated();

        // check if validated is empty
        if (empty($validated)) {
            throw new BadRequestException("No data to update");
        }

        $bottle->update($validated);

        return new ApiResponse($bottle, "Bottle updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BottleVariant  $bottle
     * @return \Illuminate\Http\Response
     */
    public function destroy(BottleVariant $bottle)
    {
        $bottle->delete();

        return new ApiResponse([], "Bottle deleted successfully");
    }
}
