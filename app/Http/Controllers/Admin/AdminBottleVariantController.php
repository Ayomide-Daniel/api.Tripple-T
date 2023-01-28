<?php

namespace App\Http\Controllers\Admin;

use App\Models\BottleVariant;
use App\Http\Resources\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\BottleVariantStoreRequest;
use App\Http\Requests\BottleVariantUpdateRequest;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AdminBottleVariantController extends Controller
{
    public const RESOURCE_NAME = "Bottle Variant";

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BottleVariantStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(BottleVariantStoreRequest $request)
    {
        $validated = $request->validated();

        $bottle_variant = BottleVariant::create($validated);

        return new ApiResponse($bottle_variant, SELF::RESOURCE_NAME . " created successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BottleVariantUpdateRequest
     * @param  BottleVariant  $bottle_variant
     * @return \Illuminate\Http\Response
     */
    public function update(BottleVariantUpdateRequest $request, BottleVariant $bottle_variant)
    {
        $validated = $request->validated();

        // check if validated is empty
        if (empty($validated)) {
            throw new BadRequestException("No data to update");
        }

        $bottle_variant->update($validated);

        return new ApiResponse($bottle_variant, SELF::RESOURCE_NAME . " updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BottleVariant  $bottle_variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(BottleVariant $bottle_variant)
    {
        $bottle_variant->delete();

        return new ApiResponse([], SELF::RESOURCE_NAME . " deleted successfully");
    }
}
