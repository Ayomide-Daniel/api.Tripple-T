<?php

namespace App\Http\Controllers\Customer;

use App\Models\BottleVariant;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\BottleResource;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = BottleVariant::with('bottle')->get();

        return new ApiResponse($variants);
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
}
