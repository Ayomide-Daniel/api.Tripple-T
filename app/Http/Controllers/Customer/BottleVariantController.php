<?php

namespace App\Http\Controllers\Customer;

use App\Models\BottleVariant;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResponse;

class BottleVariantController extends Controller
{
    public const RESOURCE_NAME = "Bottle";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = BottleVariant::with('bottle')->get();

        return new ApiResponse($variants, Self::RESOURCE_NAME . "s fetched successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  BottleVariant  $bottle_variant
     * @return \Illuminate\Http\Response
     */
    public function show(BottleVariant $bottle_variant)
    {
        $bottle_variant->load('bottle');

        return new ApiResponse($bottle_variant, Self::RESOURCE_NAME . " fetched successfully");
    }
}
