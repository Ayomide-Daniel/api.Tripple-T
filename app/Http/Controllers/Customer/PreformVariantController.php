<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\PreformVariant;
use App\Http\Resources\ApiResponse;
use App\Http\Controllers\Controller;

class PreformVariantController extends Controller
{
    public const RESOURCE_NAME = "Preform";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = PreformVariant::with('preform')->get();

        return new ApiResponse($variants, Self::RESOURCE_NAME . "s fetched successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  PreformVariant  $preform
     * @return \Illuminate\Http\Response
     */
    public function show(PreformVariant $preform)
    {
        $preform->load('preform');

        return new ApiResponse($preform, Self::RESOURCE_NAME . " fetched successfully");
    }
}
