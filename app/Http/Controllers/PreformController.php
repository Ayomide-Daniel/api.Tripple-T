<?php

namespace App\Http\Controllers;

use App\Models\Preform;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResponse;

class PreformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = Preform::all();

        return new ApiResponse($variants, "Preforms fetched successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  Preform  $preform
     * @return \Illuminate\Http\Response
     */
    public function show(Preform $preform)
    {
        return new ApiResponse($preform, "Preform fetched successfully");
    }
}