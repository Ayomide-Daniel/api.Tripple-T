<?php

namespace App\Http\Controllers\Admin;

use App\Models\PreformVariant;
use App\Http\Resources\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PreformVariantStoreRequest;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AdminPreformVariantController extends Controller
{
    public const RESOURCE_NAME = "Preform Variant";

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PreformVariantStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PreformVariantStoreRequest $request)
    {
        $validated = $request->validated();

        $preform_variant = PreformVariant::create($validated);

        return new ApiResponse($preform_variant, SELF::RESOURCE_NAME . " created successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PreformVariantStoreRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreformVariantStoreRequest $request, PreformVariant $preform_variant)
    {
        $validated = $request->validated();

        // check if validated is empty
        if (empty($validated)) {
            throw new BadRequestException("No data to update");
        }

        $preform_variant->update($validated);

        return new ApiResponse($preform_variant, SELF::RESOURCE_NAME . " updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PreformVariant  $preform_variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreformVariant $preform_variant)
    {
        $preform_variant->delete();

    return new ApiResponse([], SELF::RESOURCE_NAME . " deleted successfully");
    }
}