<?php

namespace App\Http\Controllers\Admin;

use App\Models\Preform;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PreformStoreRequest;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AdminPreformController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PreformStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PreformStoreRequest $request)
    {
        $validated = $request->validated();

        $preform = Preform::create($validated);

        return new ApiResponse($preform, "Preform created successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PreformStoreRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreformStoreRequest $request, Preform $preform)
    {
        $validated = $request->validated();

        // check if validated is empty
        if (empty($validated)) {
            throw new BadRequestException("No data to update");
        }

        $preform->update($validated);

        return new ApiResponse($preform, "Preform updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Preform  $preform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preform $preform)
    {
        $preform->delete();

        return new ApiResponse([], "Preform deleted successfully");
    }
}